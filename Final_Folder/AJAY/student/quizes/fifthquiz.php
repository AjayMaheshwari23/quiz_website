<?php
$conn  = mysqli_connect('localhost','root','','faculty_waala2');
// $query = "SELECT * FROM quiz_data2 WHERE id=1 ";
$query = " SELECT * FROM quiz_data2 ORDER BY ID LIMIT 4,1 ";
$data  = mysqli_query($conn,$query);
// $fname = "SELECT fname FROM `quiz_data2` WHERE id='1' "
// $dataf  = mysqli_query($conn,$fname);
$total = mysqli_num_rows($data);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Make Everything sticky position  -->
    <!-- Display some important Instructions-->
    <!-- Time more decorative way -->
    <!-- scrolling issue nahi hona chahiye -->
    <!-- Total count of Questions wagera , like if found switching tabs you will be unable to submit   -->
    <!--  -->

    <div style="display: flex;">

<div>
    
</div>
        
        
        <div>
        <?php 
        foreach($data as $row){
            echo $row['fname'];
        }
        echo $total
        
        ?>

            <!-- <iframe
                src="https://docs.google.com/forms/d/e/1FAIpQLSc7UfFlj7vIFkcP68BM8DNPK0P7OymV-dUdvNWMVT9_tCIvGA/viewform?embedded=true"
                width="640" height="824" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe> -->

        </div>

        <div>
            <p id="countdown" style="position: sticky;"></p>
        </div>

    </div>

    <!-- <div id="secondsdisplay" style="color: black;">H</div> -->


</body>
<script>
    const startingminutes = 0.5;
    let time = startingminutes * 60;

    let countdownEl = document.getElementById('countdown');

    setInterval(updateCountdown, 1000);

    function updateCountdown() {
        const minutes = Math.floor(time / 60);
        let seconds = time % 60;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        countdownEl.innerHTML = ` Remaining time =  ${minutes}:${seconds}`;
        // time--;
        if (time == 10) {
            alert("Last 10 seconds , Submit Your Quiz otherwise ");
        }
        if (time == 0) {
            window.location.href = 'https://www.gmail.com';
        }
    }

    var count = 0;
    window.addEventListener('focus', function (event) {
        console.log('has focus');
    });

    window.addEventListener('blur', function (event) {
        // count++;
        if (count == 1) {
            alert('You have either Opened a new tab or switched to a different screen 🚨 ');
        } else if (count == 3) {
            window.location.href = 'https://www.gmail.com';
        }
    });


</script>

</html>