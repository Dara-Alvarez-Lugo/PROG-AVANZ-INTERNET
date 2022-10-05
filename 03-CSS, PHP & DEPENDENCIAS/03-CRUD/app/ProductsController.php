<?php

session_start();


if(isset($_POST["action"])){
    switch($_POST["action"]){
        case 'add':
            $name = strip_tags($_POST['name']);
            $description = strip_tags($_POST['description']);
            $features = strip_tags($_POST['features']);
            $brand_id = strip_tags($_POST['brand_id']);

            $slug = preg_replace('/[^A-Za-z0-9-]+/','-', $name);


            $file = "../public/img/";
            $file = $file . basename($_FILES['cover']['name']);

            if(move_uploaded_file($_FILES['cover']['name'], $target_path)) {
                echo "El archivo se ha sido subido";
            } else{
                echo "No se ha subido la imagen correctamente";
            }

            $productsController = new ProductsController();

            $productsController->postProducts($name, $file, $slug ,$description, $features, $brand_id);
            
        break;
    }
}



Class ProductsController
{
    public function getProducts()
    {
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
            'Authorization: Bearer '.$_SESSION['token']
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        $response = json_decode($response);

        if(isset($response->code) && $response->code > 0){
            return $response->data;

        }else{
            return array();
        }

    }


    public function postProducts($name, $file, $slug, $description, $features, $brand_id)
    {

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
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'features' => $description,
            'brand_id' => $brand_id,
            'cover'=> new CURLFILE($file)),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token']
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;

        $response = json_decode($response);
        

        if(isset($response->code) && $response->code > 0){
            header("Location:../products/index.php?".$response->message);
            //return $response->data;
        }else{
            header("Location:../products/index.php?Error");
            //return array();
        }


    }

    public function detailsProducts($slug){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/'.$slug,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token']
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;

        $response = json_decode($response);

        if(isset($response->code) && $response->code > 0){
            return $response->data;

        }else{
            return array();
        }

    }

}

?>