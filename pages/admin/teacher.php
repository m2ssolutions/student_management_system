<?php
    session_start();
        if(!isset($_SESSION['username'])){
             header("location:../login.php");
        }
        elseif($_SESSION['usertype']=='student'){
            header("location:../login.php");
        }
        elseif($_SESSION['usertype']=='teacher'){
            header("location:../login.php");
        }
?>
<?php
    include("../../script/conn.php");
    $query = "SELECT * FROM subject";
    $result1 = mysqli_query($conn, $query);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f10e1dd3e9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        form{
            width: 100%;
            max-width: 600px;
            
        }

        .input-group{
            margin-bottom: 30px;
            position: relative; 
            

        }

        input, textarea,select{
            width: 100%;
            padding: 10px;
            outline: 0;
            border: 3px solid black;
            color: black;
            background: transparent;
            border-radius: 24px;
            font-size: 15px;
        }

        label{
            height: 100%;
            position:absolute; 
            left: 05;
            top: 0;
            padding: 15px;
            color: black;
            cursor:text;
            transition: 0.2s;
        }  

        button{
            padding: 0;
            color: #000000;
            font-weight: bold;
            outline: none;
            background-color: #f0a500;
            border-radius: 35px;
            border: none;
            width: 100%;
            height: 35px;
            cursor: pointer;

        }

        input:focus~label,
        input:valid~label,
        textarea:focus~label,
        textarea:valid~label{
            top: -35px;
            font-size: 14px;
        }

        .row{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .row .input-group{
            flex-basis: 50%;
        }
        #validator-output {
            .valid {
                color: green;
            }
            .invalid {
                color: red;
            }
        }
    </style>
    
</head>
<body>
    <header class="header">
    <label class="logo"><img src="../../img/home/logo.png" alt=""></label>
        <div class="logout">
            <a href="../login.php" class="btn btn-outline-danger">Logout</a>
        </div>
    </header>

    <aside class="sinav">
        <ul>
            <li>
                <a href="adminhome.php" >Dashboard</a>
            </li>
            <li>
                <a  href="admission.php">Admissions</a>
            </li>
            <li>
                <a href="newStudent.php">New Student</a>
            </li>
            <li>
                <a href="viewStudent.php">View Student</a>
            </li>
            <li>
                <a class="active" href="teacher.php">Add/View Teacher</a>
            </li>
            <li>
                <a href="subject.php">Add/View Subject</a>
            </li>
        </ul>
    </aside>
    
    <div class="cont">
        <h1>Add New Teacher</h1>
        <form action="../../script/addteacher.php" method="POST">
            <fieldset >
                <legend>Personal Details</legend>
                    <div class="input-group">
                        <input type="text" id="tname" name="tname" required>
                        <label for="fname"><i class="fa-regular fa-user"></i>  First Name</label>
    
                    </div>
                    <div class="input-group">
                        <input type="email" id="temail" name="temail" required>
                        <label for="email"><i class="fa-regular fa-envelope"></i>  Email</label>
                    </div>
                    <div class="input-group">
                        <input type="text" id="tnumber" name="tnumber" placeholder="" required>
                        <label for="number"><i class="fa-solid fa-phone"></i>  Phone Number</label>
                    </div>
            </fieldset>
            <fieldset>
                <legend>Subject Details</legend>
                <div class="input-group">
                    <select name="tsub" id="tsub" >
                        <option value="null" selected>not selected</option>
                        <?php while($row1 = mysqli_fetch_array($result1)):;?>
                        <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                        <?php endwhile;?>
                    </select>
                    <!-- <label for="tname"><i class="fa-regular fa-user"></i>  Teacher name</label> -->
                </div>
            </fieldset>
            <fieldset>
                <legend>Account Details</legend>
                <div class="input-group">
                    <input type="text" id="tusername" name="tusername" required>
                    <label for="username"><i class="fa-regular fa-user"></i>  Username</label>
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" required>
                    <label for="password"><i class="fa fa-key"></i> password</label>
                </div>
                <div class="input-group">
                    <input type="password" id="cpassword" name="cpassword" required>
                    <label for="cpassword"><i class="fa fa-key"></i>  Confirm-password</label>
                </div>
            </fieldset>
            <div id="validator-output"></div>
            <button type="submit" name="add">ADD NEW SUBJECT<i class="fa-regular fa-paper-plane"></i></button><br>
            <hr><br>
        </form>
        <h1>Teachers</h1>
        <form action="#" method="post">
        <table class="table">
            <tr>
                <th>username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject</th>
                
            </tr>
            <?php
                include("../../script/conn.php");
                $sql5="SELECT * FROM teacher,subject WHERE subject.sub_id=teacher.sub_id";
                $result = mysqli_query($conn,$sql5);
                if(!$result){
                    die("invalid quary".mysqli_error($conn));
                }
                while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row['tusername']?></td>
                <td><?php echo $row['tname']?></td>
                <td><?php echo $row['temail']?></td>
                <td><?php echo $row['tphone']?></td>
                <td><?php echo $row['sub_name']?></td>

                
                
            </tr>
            <?php }?>
        </table>
        </form>
        
    </div>
    
    

    <footer>
    
        <h6>Follow us on </h6>
        <ul>
          <li><a href="https://www.facebook.com"><img src="../../img/home/icons8-facebook-48.png" alt=""></a></li>
          <li><a href="https://www.youtube.com"><img src="../../img/home/icons8-youtube-logo-48.png" alt=""></a></li>
        </ul>
        
        <h6>©All Rights Reserved.</h6>
    </footer>

    <script>
        $(function () {
  $("#validator-output").realtimePasswordValidator({
    debug: true,
    input1: $("#password"),
    input2: $("#cpassword"),
    validators: [
      {
        regexp: ".{8,}",
        message: "Minimum 8 chars"
      },
      {
        regexp: "[a-z]",
        message: "1 lowercase"
      },
      {
        regexp: "[A-Z]",
        message: "1 uppercase"
      },
      {
        regexp: "[0-9]",
        message: "1 number"
      },
      {
        regexp: ".*[!@#$%?=*&]",
        message: "1 special char !@#$%?=*&"
      },
      {
        compare: true,
        message: "Password confirmation must be the same"
      }
    ],
    ok: function (instance) {
      console.log("ok");

      $("#submit").removeAttr("disabled");
    },
    ko: function (instance) {
      console.log("ko");
      $("#submit").attr("disabled", "");
    }
  });
});

// plugin definition
(function ($, window, document, undefined) {
  "use strict";
  var pluginName = "realtimePasswordValidator",
    defaults = {
      debug: false
    };
  function Plugin(element, options) {
    this.element = element;
    this.settings = $.extend({}, defaults, options);
    this._defaults = defaults;
    this._name = pluginName;
    this.init();
  }

  $.extend(Plugin.prototype, {
    init: function () {
      this.settings.input1.on("input", { self: this }, this.validateEvent);
      this.settings.input2.on("input", { self: this }, this.validateEvent);
    },

    validateEvent: function (event) {
      const self = event.data.self;
      const messages = [];
      let valid_count = 0;
      $(self.element).empty();
      $(self.settings.validators).each(function (index, validator) {
        let valid = false;
        if (validator.regexp)
          valid = new RegExp(validator.regexp).test(self.settings.input1.val());
        if (validator.compare)
          valid = self.settings.input1.val() == $(self.settings.input2).val();
        const message = $("<div>" + validator.message + "</div>");
        message.addClass(valid ? "valid" : "invalid");
        if (self.settings.input1.val().length > 0)
          $(self.element).append(message);
        if (valid) valid_count++;
        if (this.debug)
          console.log(
            index,
            self.settings.input1.val(),
            validator.message,
            valid
          );
      });
      if (valid_count == self.settings.validators.length) {
        if (self.settings.ok) self.settings.ok(self);
      } else {
        if (self.settings.ko) self.settings.ko(self);
      }
      if (this.debug)
        console.log(
          "valid",
          valid_count,
          "of",
          self.settings.validators.length
        );
    }
  });

  $.fn[pluginName] = function (options) {
    return this.each(function () {
      if (!$.data(this, "plugin_" + pluginName)) {
        $.data(this, "plugin_" + pluginName, new Plugin(this, options));
      }
    });
  };
})(jQuery, window, document);

    </script>
</body>
</html>

