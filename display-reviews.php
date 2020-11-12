<?php


$servename = "127.0.0.1";
$DBuname = "root";
$DBPass = "mysql123";
$DBname = "cs230";

$conn = mysqli_connect($servename, $DBuname, $DBPass, $DBname);

if(!$conn) {
    die("Connection failed...".mysqli_connect_error());
    # code...
}
/** Shows 4 reviews below each image. DOES NOT GET TO ELSE STATEMENT SO NONE OF IT RUNS?? **/
$item_id = $_GET['id']; 
$sql = "SELECT * FROM reviews WHERE item_id='$item_id' LIMIT 4";    //grab the first 4 reviews from the db

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){ //as long as the num of rows is > 0
    while($row = mysqli_fetch_assoc($result)){ //while there is an assoc array to fetch
        $uname = $row['uname'];
        $prosql = "SELECT picpath FROM profile WHERE uname = '$uname';";
        $res = mysqli_query($conn, $prosql);
        $picpath = mysqli_fetch_assoc($res);
                
        /* creating a media object */
        echo '
        <div class="card mx-auto" style="width: 30%; padding: 5px; margin-bottom: 10px;">
            <div class="media">
                <img class="mr-3" src="'.$picpath['picpath'].'" style= "max-width: 75px; max-height: 75px; border-radius: 50%;">
                <div class="media-body">
                    <h4 class="mt-0">'.$row['uname'].'</h4>
                    <h5 class="mt-0">'.$row['title'].'</h5>
                    <p>'.$row['rev_date'].'</p>
                    <p>'.$row['review_text'].'</p>
                </div>
            </div>
        </div>
        ';
    }
}
else{
    echo '<h5 style= "text-align: center">No Reviews Yet!</h5>';        //DOES NOT GET HERE???
}