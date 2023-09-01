<?php

$conn = new mysqli('localhost', 'root', '', 'store_feedback');

$error = "";
$message = "";

$get_ratings = "SELECT * FROM ratings";
$ratings     = $conn->query($get_ratings);

$get_stores  = "SELECT * FROM store";
$stores      = $conn->query($get_stores);

$get_devices = "SELECT * FROM device";
$devices     = $conn->query($get_devices);



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $store    = isset($_POST['store']) ? $_POST['store']  : "";
    $feedback = isset($_POST['feedback']) ? $_POST['feedback'] : '';
    $device = isset($_POST['device']) ? $_POST['device'] : "";
    
   if (empty($store)) 
        $error = "Please select store";
    
    elseif (empty($feedback))
        $error = "Please select feedback";

    elseif (empty($device))
        $error = "Please select device";

    

    if (empty($error)) {
       
        $sql = "INSERT INTO feedback(Devices, rating_code, store_code)
                VALUES ( '$device','$feedback', '$store')";

        if ($conn->query($sql) === TRUE) {
          
        } else {
            $error = "Unable to create feedback.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Store Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="test.css"> 
</head>
<body>
 <div id = "thnkyoumessage"></div>
 
    <div id="form">
 <div class="con">
 
 <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" id = "hide" method="POST" >
   <div id="container_logo"> 
    <div id="logo"></div>
    </div>
        <div style="margin-top: 20px; display: flex; justify-content: center; width:100% " > 

        <select id="store"  onclick = "showSelectedValue()">
            <option name=""></option>
                <?php foreach($stores as $store): ?>
                    <option value="<?php echo $store['store_code'];?>">           
                    <?php echo  $store['store_name'];?>

                    </option>
                    

                <?php endforeach; ?>

            </select>
            <select id="device" style='z-index: 2; position: absolute;width: 10px;
                        border: none;
                        background: none;
                        opacity: 0.1; outline: none;' onclick = "showSelectedDevice()">
            

                <?php foreach($devices as $device): ?>

                    <option value="<?php echo $device['serial'];?>">
                            
                    <?php echo  $device['device_name'];?>

                    </option>
                <?php endforeach; ?>

            </select>
        </div>  
      <div id="conselected" style=" display: flex; align-items: center;justify-content: center;">
        <h2 id="selectedValue"></h2>
        <h3 id="selectedDevice" style = "
                        text-align: center;
                        font-size: 40px;
                        color: blue;
                        margin-top: -500px;
                        margin-right: 80%;
                        opacity: 0.1;
                        position: absolute;

                        "></h3>
        <p id = "pls" >Please  put your Feedback by clicking this emote!</p>
     </div>
        <div class="con2" style="margin-top: 79px;  ">
                <div id="btn">
                    <button type="submit" name="feedback"  id="feedback" value="1">  <div class="con_emoji">
                        <div class="face" id="emote" onclick = "emote()" >
                            <div class="eyesbrow">
                                <span id="eyes"></span>
                                <span id="eyes"></span>
                            </div>
                            <div class="eye_smile">
                                <span>&#10084;</span>
                                <span>&#10084;</span>
                            </div>
                            <div class="mouth_smile">
                                <span></span>
                            </div>
                        </div>
                        <div class="name" style="color:darkviolet;">Very Happy</div>
                    </button>
                </div>
                <div id="btn">
                    <button type="submit" name="feedback"  id="feedback" value="2">  <div class="con_emoji">
                        <div class="face2"  id="emote" onclick = "emote()">
                            <div class="eyesbrow">
                                <span id="eyes"></span>
                                <span id="eyes"></span>
                            </div>
                            <div class="eye">
                                <span></span>
                                <span></span>
                            </div>
                            <div class="mouth_excellent"></div>
                        </div>
                        <div class="name"style="color: green">Happy</div>
                    </button>
                </div>
            
                       
                <div id="btn">
                <button type="submit" name="feedback"  id="feedback" value="4"><div class="con_emoji">
                    <div class="face4"  id="emote" onclick = "emote()">
                        <div class="eyesbrow">
                            <span id="eyes"></span>
                            <span id="eyes"></span>
                        </div>
                        <div class="eye_sad">
                            <span></span>
                            <span></span>
                        </div>
                        <div class="mouth_sad"></div>
                    </div>
                    <div class="name"style="color:grey">&nbsp;&nbsp;Sad</div>
                </button>
                </div>
                <div id="btn">
                    <button type="submit" name="feedback"  id="feedback" value="5"><div class="con_emoji">
                    <div class="face5"  id="emote" onclick = "emote()">
                        <div class="eyesbrow_angry">
                            <span id="eyes"></span>
                            <span id="eyes2"></span>
                        </div>
                        <div class="eye">
                            <span></span>
                            <span></span>
                        </div>
                        <div class="mouth_sad"></div>
                    </div>
                    <div class="name"style="color:red">Angry</div>
                </button>
                </div>
                <?php foreach($ratings as $rating): ?>
                    <?php endforeach; ?>
        </div>       
    </form>
    </div>
</div>

    <script> 
        function showSelectedValue() {
            const selectElementdevice = document.getElementById("device");
            const selectElement = document.getElementById("store")
            const selectedValue = selectElement.options[selectElement.selectedIndex].text;
            const selectedValueDevice = selectElementdevice.options[selectElementdevice.selectedIndex].text;
            document.getElementById("selectedValue").innerHTML = selectedValue;
            document.getElementById("selectedDevice").innerHTML = selectedValueDevice;
        }
        function showSelectedDevice() {
            const selectElementdevice = document.getElementById("device");
            
        
            const selectedValueDevice = selectElementdevice.options[selectElementdevice.selectedIndex].text;
            
            document.getElementById("selectedDevice").innerHTML = selectedValueDevice;
        }
       
    let feedbackButtons = document.getElementsByName("feedback");
    feedbackButtons.forEach(button => {
        button.addEventListener("click", function(event) {
            event.preventDefault();
            let feedback = button.value;
            let store = document.getElementById("store").value;
            let device = document.getElementById("device").value;
            emoji(feedback, store, device);
        });
    });
    function emoji(feedback, store, device) {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                showThankYouMessage();
                document.getElementById("thnkyoumessage").innerHTML = "Thank  you for your feedback!&#128151;";
            }
        };
        xhttp.open("POST", "index.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("feedback=" + feedback + "&store=" + store + "&device=" + device);

        function showThankYouMessage(){
            var messageDiv = document.getElementById("thnkyoumessage");
            var ettote = document.getElementById("hide");
            ettote.style.display = "none";

            messageDiv.style.display = "block";
         
            setTimeout(function(){
                messageDiv.style.display ="none";
                ettote.style.display = "block";
            },3000)
        }
    }
</script>
</body>
</html>