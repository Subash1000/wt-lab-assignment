
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<body>
    <style>
        .form-group {
            margin-top: 10px;
        }

        
    </style>
    <form action="../action/save.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="Username">Username :</label>
            <input type="text" id="Username" placeholder="username" name="username">
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" placeholder="email" name="email" value="email@email.com">
        </div>
        <div class="form-group">
            <label for="password">Password :</label>
            <input type="password" id="password" placeholder="password" name="password" value="password">
        </div>
        <div class="form-group">
            <label for="date">Date :</label>
            <input type="date" id="date" placeholder="date" value="date" name="dob">
        </div>
        <div class="form-group">
            <label for="color">Color :</label>
            <input type="color" id="color" name="color">
        </div>
        <div class="form-group">
            <label for="weight">Weight kg :</label>
            <input type="number" id="weight" name="weight" name="weight">
        </div>
        <div class="form-group">
            <label for="gender">Gender :</label>
            <div>
                <label for="male">Male</label>
                <input type="radio" id="male" name="gender" value="male">
                <label for="female">Female</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="other">other</label>
                <input type="radio" id="other" name="gender" value="other">
            </div>

        </div>
        <div class="form-group">
            <label>Hobbies :</label>
            <input type="checkbox" id="travelling" value="travelling" name="hobbies[]"><label for="travelling">Travelling</label>
            <input type="checkbox" id="reading" value="reading" name="hobbies[]"><label for="reading">Reading</label>
            <input type="checkbox" id="singing" value="singing" name="hobbies[]"><label for="singing">Singing</label>
            <input type="checkbox" id="coding" value="coding" name="hobbies[]"><label for="coding">Coding</label>
        </div>
        <div class="form-group">
            <label for="nationality">Nationality :</label>
            <select name="nationality" id="">
                <option value="NP">Nepal</option>
                <option value="IN">India</option>
                <option value="CH">China</option>
                <option value="UK">United Kingdom</option>
            </select>
        </div>

        <div class="form-group">
            <label id="profile">Profile</label>
            <input type="file" name="profile" id="profile" accept=".png">
        </div>
        <div class="form-group">

            <input type="submit" value="Submit">
            <input type="reset" value="Cancel">
        </div>
    </form>

</body>

</html>
