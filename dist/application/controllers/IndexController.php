<?php
class IndexController implements IController {
	public function indexAction() {
	   
        $fc = FrontController::getInstance();

        $model = new FileModel();
        $textModel = new TextModel();
        $arrText= $textModel->getText(1);

        $reviewModel = new ReviewModel();
        $model->review = $reviewModel->getReview();

        $galleryModel= new GalleryModel();
        $model->gallery = $galleryModel->getGallery();

        $model->title = $arrText["title"];
        $model->seo_desc = $arrText["seo_desc"];
        $model->keywords = $arrText["keywords"];
        $model->h1 = $arrText["h1"];
        $model->h2 = $arrText["h2"];
        $model->text = $arrText["text"];
        $model->text2 = $arrText["text2"];

        //выводим все
		$output = $model->render(INDEX_TPL);
		
		$fc->setBody($output);
	}
}
