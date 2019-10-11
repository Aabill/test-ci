<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome!</title>
</head>
<body>
    <h1>Welcome Yorrds!</h1>
    <?php 
    /* if ($this->session->has_userdata('user_id') !== NULL)
    {
        echo  'Yoeds';
        
    } */
    echo 'Sessions: <br>';
    echo "User's ID = " . $this->session->userdata('user_id') . '<br>';
    echo "User's Name = " . $this->session->userdata('user_name') . '<br>';
    
    
?>
    
</body>
</html>