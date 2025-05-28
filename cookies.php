<?php

if(isset($_COOKIE['visitCount'])){
    $visitCount = $_COOKIE['visitCount']+1;
} else{
    $visitCount =1;
}

if($visitCount == 20){
    setcookie('visitCount', '', time()-3600);
    echo "This is your 20th visit. Resetting visit count.<br>";
    $visitCount = 0;
} else{
    // expires in 1 year
    setcookie('visitCount',$visitCount,time()+(365*24*60*60));
    echo "Number Of views : $visitCount<br>";
}

if ($visitCount == 5) {
    echo "🎉 This is your 5th visit! Thanks for coming back!<br>";
} elseif ($visitCount == 10) {
    echo "🏅 Wow! This is your 10th visit!<br>";
} elseif ($visitCount == 15) {
    echo "🌟 Amazing! 15 visits! You're a loyal visitor!<br>";
}

?>