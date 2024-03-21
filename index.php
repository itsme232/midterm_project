<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Page</title>
    <link rel="stylesheet" type="text/css" href="insert.php">
    <style>
        body {
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #ADD8E6;
            border-radius: 10px;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
 <div class="container">
    <form id="myForm">
    <h1>Registration Form</h1>
    
    <div>
            <label for="uname">Username:</label>
            <br>
            <input type="text" name="uname" id="uname" placeholder="Username">
        </div>
        <div>
            <label for="fname">First Name:</label>
            <br>
            <input type="text" name="fname" id="fname" placeholder="First Name">
        </div>

        <div>
            <label for="mname">Middle Name:</label>
            <br>
            <input type="text" name="mname" id="mname" placeholder="Middle Name">
        </div>

        <div>
            <label for="lname">Last Name:</label>
            <br>
            <input type="text" name="lname" id="lname" placeholder="Last Name">
        </div>

        <div>
            <label>Gender:</label>
            <div class="gender-radio">
                <input type="radio" id="male" name="gender" value="male" required>
                <label for="male">M</label>
                <input type="radio" id="female" name="gender" value="female" required>
                <label for="female">F</label>
            </div>
        </div>

        <div>
            <label for="birthdate">Birth Date:</label>
            <br>
            <input type="date" name="birthdate" id="birthdate" placeholder="Birth Date">
        </div>

        <div>
            <label for="age">Age:</label>
            <br>
            <input type="text" name="age" id="age" placeholder="Age">
        </div>
        
        <div>
        <label for="em_address">Email Address:</label>
        <br>
        <input type="text" name="em_address" id="em_address" placeholder="Email Address">
    </div>
    
    <div class="form-group">
        <label for="password">Password:</label>
        <br>
        <input type="password" name="password" id="password" placeholder="Password" pattern= "(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" required>
    </div>

    <div class="form-group">
       <button>Submit</button>
    </div>
</form>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#myForm").submit(function(e) {
                e.preventDefault();

                const formData = {
                    "uname": $("#username").val(),
                    "fname": $("#first_name").val(),
                    "mname": $("#middle_name").val(),
                    "lname": $("#lname").val(),
                    "gender": $("input[name='gender']:checked").val(),
                    "birthdate": $("#birthdate").val(),
                    "age": $("#age").val(),
                    "em_address": $("#em_address").val(),
                    "password": $("#password").val()
                };
                
                $.ajax({
                    type: 'POST',
                    url: 'insert.php',
                    data: formData,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(error) {
                        console.error("Error!", error);
                    }
                });
            });
        });
    </script>

<script>
    
    function calculateAge() {
       
        var birthdate = document.getElementById("birthdate").value;
        
        var today = new Date();
        var birthDate = new Date(birthdate);
        var age = today.getFullYear() - birthDate.getFullYear();
        var monthDiff = today.getMonth() - birthDate.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
    
        document.getElementById("age").value = age;
    }

    document.getElementById("birthdate").addEventListener("change", calculateAge);
</script>

</body>
</html>