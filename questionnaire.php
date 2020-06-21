<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/recommendations.css">
    <?php include 'php/recommendations.php';?>
  </head>

  <body>

    <div class="top">
      <h1>Mr. Uziel</h1>
      <h4>Recommendation Letter System</h4>
    </div>

    <div class="nav">
      <a href="#">home</a>
      <a href="#">logout</a>
      <a href="#">login</a>
      <a href="#">sign up</a>
      <a href="#">responses</a>
      <a href="#">admin</a>
    </div>

    <div class="rest">

      <p>
        <b>If</b> I agreed to write you a recommendation for college, <b>then</b> fill out the form below as best you can.  I write letters over the summer, and will not have time come September.
        <br><br>
        To make my letter a great letter, remind me about specific things you did that made you stand out. Do not include things I already know like “I participated a lot” or “I did well on tests” or “I always did my homework”.
        <br><br>
        One specific anecdote (story) you tell me is worth a hundred general statements!
      </p>

      <hr>

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

        First Name: <input type="text" name="firstName" value="<?php echo $firstName;?>">
        <span class="error">* <?php echo $firstNameErr;?></span><br><br>

        Last Name: <input type="text" name="lastName" value="<?php echo $lastName;?>">
        <span class="error">* <?php echo $lastNameErr;?></span><br><br>

        E-mail: <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span><br><br>

        <div class="questions">
          Describe any class demonstrations you may have participated in.  What was your role?
        </div>
        <textarea name="question01" rows="8" cols="80"><?php echo $q1;?></textarea><br>&nbsp;

        <div class="questions">
          Are there any interesting questions you remember asking in class, or after class? Be specific.
        </div>
        <textarea name="question02" rows="8" cols="80"><?php echo $q2;?></textarea><br>&nbsp;

        <div class="questions">
          Was there something, a concept, that you learned in class that you put to use, or observed in your life and activities outside of class. Again, be specific.
        </div>
        <textarea name="question03" rows="8" cols="80"><?php echo $q3;?></textarea><br>&nbsp;

        <div class="questions">
          Were there any science extracurricular activities you participated in while in high school? Is there a program you will be attending this summer? Be specific with the name and dates of the program.
        </div>
        <textarea name="question04" rows="8" cols="80"><?php echo $q4;?></textarea><br>&nbsp;

        <div class="questions">
          If you already have a good idea as to what you want to study in college, or a career goal for the future, let me know what it is, and how sure you are of this. It's okay to put undecided, or multiple answers.
        </div>
        <textarea name="question05" rows="2" cols="80"><?php echo $q5;?></textarea><br>&nbsp;

        <div class="questions">
          Is there any work (perhaps with my comments) that you would like to upload that demonstrates the quality of your work? If so, take a photo or upload from your device using the button below (Maximum File Size is 10 MB).
        </div>
        <input type="file" name="work" /><span class="file"></span><br><span class="error"></span><br>&nbsp;

        <div class="questions">
          Is there anything else you think made you stand out that was not addressed in the previous questions? If so tell me!
        </div>
        <textarea name="question06" rows="8" cols="80"><?php echo $q6;?></textarea><br>

        <button type="submit" class="btn btn-info">Submit Responses</button>

      </form>

    </div>

  </body>
</html>
