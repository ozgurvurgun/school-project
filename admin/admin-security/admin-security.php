<?php
function security($text)
{
    $text = trim($_POST[$text]);//gelen string i trimler (sağdan,soldan boşlukları alır)
    $text = stripslashes($text);// string i slash karakterinden arındırır
    $text = htmlspecialchars($text);// gelen string içinde ki html karakterleri temizler
    return $text;
}