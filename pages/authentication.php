<?php
function authUser()
{
    return '
        <section class="login">
        <div class="login_box">
            <div class="left">
                <div class="contact">
                    <form name="authentication_form" action="login_post.php" method="post" onsubmit="return validate(this)">
                        <h3>SIGN IN</h3>
                        <input class="input--field" name="username" placeholder="USERNAME">
                        <input class="input--field" type="password" name="password" placeholder="PASSWORD">
                        <input class="button" type="submit" name="submit" value="Submit" />
                        <input class="button" type="button" onclick="window.location.replace()" value="Cancel" />
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="right-inductor"><img src="../assets/styles/bug.png" alt="bug tracker"></div>
                <div class="right-text">
                    <h2>Bughound</h2>
                    <h5>Bug Tracking System</h5>
                </div>
            </div>
        </div>
    </section>
    ';
}
