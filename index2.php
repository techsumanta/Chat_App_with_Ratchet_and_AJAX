<?php
session_start();
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $_SESSION['name'] = $name;
}
?>

<?php
if(!isset($_SESSION['name'])){
?>
<form action="#" method="post">
    <input type="text" name="name">
    <input type="submit" name="submit" value="Submit">
</form>
<?php
} else {
?>

<input type="text" id="msg">
<input type="button" id="btn" value="Send">

<div id="msg_box"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
    var conn = new WebSocket('ws://localhost:8080');
    conn.onopen = function(e) {
        console.log("Connection established!");
    };

    conn.onmessage = function(e) {
        var getData = jQuery.parseJSON(e.data);
        var html = "<b>"+getData.name+"</b>: "+getData.msg+"</br>";
        jQuery("#msg_box").append(html);
        console.log(e.data);
    };

    jQuery('#btn').click(function(){
        var msg = jQuery('#msg').val();
        var name = "<?php echo $_SESSION['name'] ?>";
        var content = {
            msg: msg,
            name: name
        };
        conn.send(JSON.stringify(content));
        var html = "<b>"+name+"</b>: "+msg+"</br>";
        jQuery("#msg_box").append(html);
        jQuery("#msg").val('');
    });
</script>
<?php
}
?>