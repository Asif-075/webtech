<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css" />

    <title>Book library</title>
  </head>
  <body>
    <div class="main">
      <img src="myid.png" alt="image" width="100" height="40" >
      <div class="right-box"></div>

      <div class="main-section">
        <section class="top">
          <div class="box1"></div>
          <div class="box1"></div>
          <div class="box1"></div>
        </section>
        <section class="middle">
          <div class="box2"></div>
          <div class="box2"></div>
          <div class="box2"></div>
        </section>
        <section class="lower">
          <div class="box3-1">
          <form class="form " action="process.php" method="post">
        <input class="input " type="text" name="field1" placeholder="Student Full Name"><br>
        <input  class="input " type="text" name="field2" placeholder="Student ID"><br>
        <input  class="input " type="text" name="field3" placeholder="E-mail"><br>
        <select class="input" id="book-select" name="field4">
                <option value="Book 1">Book 1</option>
                <option value="Book2">Book2</option>
                <option value="Book3">Book3</option>
                <option value="Book4">Book4</option>
                <option value="Book5">Book5</option>
                <option value="Book6">Book6</option>
                <option value="Book7">Book7</option>
                <option value="Book8">Book8</option>
                <option value="Book9">Book9</option>
                <option value="Book10">Book10</option>
              </select><br>
        Borrow date:<input  class="input " type="date" name="field5" placeholder="Borrow Date"><br>
        Return date:<input  class="input " type="date" name="field6" placeholder="Return date"><br>
        <input  class="input " type="number" name="field7" placeholder="Token Number"><br>
        <input  class="input " type="number" name="field8" placeholder="Fees"><br>
        <input  class="input " type="submit" name="submit" value="Submit">
         </form>
          </div>
          <div class="box3"></div>
        </section>
      </div>

      <div class="left-box"></div>
    </div>
  </body>
</html>
