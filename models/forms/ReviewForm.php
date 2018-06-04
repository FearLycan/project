<?php

namespace app\models\forms;

use app\models\Image;
use app\models\Review;
use Yii;

class ReviewForm extends Review
{
    public $myFiles;
    public $names;

    public function rules()
    {
        return [
            [['content'], 'string'],
            [['confirmed_by_purchase'], 'integer'],
            [['rating'], 'number'],
            [['content', 'rating'], 'required'],
            ['content', 'canBeReviewed'],

            [['myFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024 * 3, 'maxFiles' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'content' => 'Treść',
            'myFiles' => 'Zdjęcia',
            'rating' => 'Ocena',
            'confirmed_by_purchase' => 'Recenzja potwierdzona zakupem',
        ];
    }

    /**
     * @return bool
     */
    public function upload()
    {
        if ($this->validate()) {

            $this->names = [];

            foreach ($this->myFiles as $file) {
                $randomString = Yii::$app->getSecurity()->generateRandomString(15);
                $name = $randomString . '.' . $file->extension;
                $url = Image::URL_REVIEW . $name;
                $urlThumb = Image::URL_THUMBNAIL_REVIEW . $name;
                //$this->image = $name;

                if (!$file->saveAs($url)) {
                    $this->addError('myFile', 'Unable to save the uploaded file');
                }

                Image::createThumbnail($url, $urlThumb, Image::THUMBNAIL_MAX_WIDTH, Image::THUMBNAIL_MAX_HEIGHT);
                Image::changeSize($url, Image::IMAGE_REVIEW_MAX_WIDTH, Image::IMAGE_REVIEW_MAX_HEIGHT);

                $this->names[] = $name;

            }

            return true;
        } else {
            return false;
        }
    }

    /**
     * Validator - check limit of offers of the same game for single user.
     *
     * @param string $attribute
     */
    public function canBeReviewed($attribute)
    {
        $review = self::find()
            ->where([
                'item_id' => $this->item_id,
                'author_id' => $this->author_id,
            ])
            ->andWhere(['<>','id', $this->id])
            ->one();

        /* @var $review \app\models\Review */
        if (!empty($review)) {
            if ($review->status == self::STATUS_PENDING) {
                $this->addError($attribute, 'Twoja poprzednia recenzja oczekuję na akcpetację.');
            }else{
                $this->addError($attribute, 'Jeden użytkownik może stworzyć tylko jedną recenzję dla jednego przemiotu.');
            }
        }
    }
}