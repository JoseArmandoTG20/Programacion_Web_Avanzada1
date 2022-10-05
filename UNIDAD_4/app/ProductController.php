<?php
    session_start();

    if(isset($_POST['action'])){
        switch($_POST['action']){
            case 'addProduct':
                $name_P = strip_tags($_POST['name_P']);
                $description_P = strip_tags($_POST['description_P']);
                $features_P = strip_tags($_POST['features_P']);

                $productController = new ProductController();
                $productController ->createProduct($name_P,$description_P,$features_P);
            break;
        }

    }

class ProductController{
    public function getProducts(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$_SESSION['token'])
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        $response = json_decode($response);

        if(isset($response -> code)&& $response -> code > 0){
            return $response -> data;
        }
    }

    public function createProduct($name_P,$description_P,$features_P){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'name' => $name_P,
            'slug' => ' ',
            'description' => $description_P,
            'features' => $features_P,
            'brand_id' => '1'),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token'])
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}

?>