<?php
function current_user(){
    return auth()->user();
}

function uploadImage($folder,$image){
    $image->store('/',$folder);
    $fileName=$image->hashName();
    $path='img/'.$folder.'/'.$fileName;
    return $path;
}