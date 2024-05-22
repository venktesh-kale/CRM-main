<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<body>   
    <div class="log_prt">
        <div class="logbox">
            <div class="sub_box1">
                <div class="loglogo">
                    <img src="./NewImages/logo-removebg-preview.png" alt="Logo of CHANAKYA">
                </div>    
                <div class="logtext">
                    <div>
                        <h2 class="t1">CHANAKYA</h2><h2 class="t2">E-SERVICES</h2>
                    </div>

                    <h3>"The smallest things make the biggest difference"</h3>
                </div>
            </div>

        <form action="login_process.php" method="post">
            <div class="sub_box2">

                
                    <div class="loghead">
                        <h1>Login</h1>
                    </div>

                    <div class="inputdiv">
                        <label for="user">User ID:</label>
                        <input type="text" name="username" id="username" class="inputbox" placeholder="user1">                    
                    </div>

                    <div class="inputdiv">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="inputbox" placeholder="pass1">
                    </div>

                    <div class="inputdiv">
                        <label for="usertype">Designation:</label>
                        <select name="usertype" id="designation">

                            <option value="#">Please Choose Your Designation</option>
                            <option value="director">DIRECTOR</option>
                            <option value="ceo">CEO</option>
                            <option value="admin_panel">ADMIN PANEL</option>
                            <option value="accountant">ACCOUNTANT</option>
                            <option value="mis">MIS</option>
                            <option value="hr_head">HR HEAD</option>
                            <option value="hr_executive">HR EXECUTIVE</option>
                            <option value="marketing_manager">MARKETING MANAGER</option>
                            <option value="hr_recruiter">OPERATOR - HR RECRUITER</option>
                            <option value="legal_officer">LEGAL OFFICER</option>
                            <option value="project_manager">PROJECT MANAGER</option>
                            <option value="assistant_project_manager">ASSISTANT PROJECT MANAGER</option>
                            <option value="bgl_recovery_executive">BGL RECOVERY EXECUTIVE</option>
                            <option value="technical_support">TECHNICAL SUPPORT</option>
                            <option value="crm_admin_panel">CRM ADMIN PANEL</option>
                        </select>
                    </div>
                    <div class="submitdiv">
                        <button type="submit">Enter</button>
                    </div>
            </div>
        </form>
        </div>
    </div>
</body>
</html>