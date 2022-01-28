

<footer style="background-color: #1a1e218a; margin-top:15px; color: #ffffff; font-size: 16px; box-sizing: border-box; border: none; outline: none;">
    <div style="padding: 2em 1em;display: grid; grid-template-columns: 2fr 1fr 2fr; align-items: stretch;">
        <div class=" about" style="width: 100%; display: flex; flex-direction: column; padding: 0 2em; min-height: 15em;">
            <h3 style="width: 100%; text-align: left; color: #2a8ded; font-size: 1.6em; white-space: nowrap;"><img src="images/snap_logo_big.png" height="40px" width="60px"> &nbsp; Snap HomeWork</h3>
            <p style="text-align: justify; line-height: 2; margin: 0;">
                A Trusted Learning Community like None Other
                Trusted by 2000 schools, 55,000 teachers and
                2 million users &nbsp;
                Over 10 million learning resources by teachers, parents and students
                Create. Share. Appreciate. Celebrate.
            </p>
        </div>
        <div class="column links" style="width: 100%; display: flex; flex-direction: column; padding: 0 2em; min-height: 15em;">
            <h3 style="width: 100%; text-align: left; color: #2a8ded; font-size: 1.6em; white-space: nowrap;">Quick Links</h3>
            <ul style="list-style: none; display: flex; flex-direction: column; padding: 0; margin: 0;">
                <li>
                    <a style="color: #ffffff; text-decoration: none;" href="">F.A.Q</a>
                </li>
                <li>
                    <a style="color: #ffffff; text-decoration: none;" href="">Cookies Policy</a>
                </li>
                <li>
                    <a style="color: #ffffff; text-decoration: none;" href="">Terms Of Service</a>
                </li>
                <li>
                    <a style="color: #ffffff; text-decoration: none;" href="">Support</a>
                </li>
                <li>
                    <a style="color: #ffffff; text-decoration: none;" href="">Careers</a>
                </li>
            </ul>
        </div>
        <div class=" subscribe" style="width: 100%; display: flex; flex-direction: column; padding: 0 2em; min-height: 15em;">
            <h3 style="width: 100%; text-align: left; color: #2a8ded; font-size: 1.6em; white-space: nowrap;">Subscribe</h3>
<!--            <form action="emailaction.php" method="get" >-->
            <div>
                <input style="font-size: 1em; color:white; background: transparent; padding: 1em; width: 100%; border-radius: 5px; margin-bottom: 10px;" type="email" placeholder="Your email id here" id="getemail" />
                <button style=" background-color: #2a8ded; color: #ffffff; font-size: 1em; padding: 1em; width: 100%; border-radius: 5px; margin-bottom: 5px;" type="submit" onclick="subscribe()">Subscribe</button>
            </div>
<!--            </form>-->
            <div style="display: flex; justify-content: space-around;font-size: 2.4em;flex-direction: row;margin-top: 0.5em;">
                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                <a href="https://www.instagram.com/"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
    <div style=" padding: 2em 1em; display: flex;justify-content:  space-around; align-items:center;text-align: center;">
        <div style="padding: 1em 0;width: 100%;">
            <p>
                <i style="font-size: 1.8em;color: #2a8ded;" class="fas fa-phone-alt"></i>
            </p>
            <p>+91 6239107957</p>
        </div>
        <div style="padding: 1em 0;width: 100%;">
            <p><i style="font-size: 1.8em;color: #2a8ded;" class="fas fa-envelope"></i></p>
            <p>abhishek.kp6239@gmail.com.com</p>
        </div>
        <div style="padding: 1em 0;width: 100%;">
            <p><i style="font-size: 1.8em;color: #2a8ded;" class="fas fa-map-marker-alt"></i></p>
            <p>Kamla Devi Avenue, Amritsar</p>
        </div>
    </div>
    <div style=" padding: 2em 1em;background-color: #25262e;">
        <p style="font-size: 0.9em;text-align: center;" >Copyright &copy; 2021 Snap HomeWork | All Rights Reserved</p>
    </div>
</footer>

<script>

    // let email = document.getElementById("getemail").value;
    // alert(email);
    function subscribe() {
        let email = document.getElementById("getemail").value;
        let newEmail=email.toString();
        let httpRequest = new XMLHttpRequest();
        httpRequest.open('GET', 'emailaction.php?emailrec='+newEmail, true);
        httpRequest.send();
        httpRequest.onreadystatechange = function () {
            // alert("sending");
            if (this.readyState === 4 && this.status === 200) {
                // document.getElementById('assign').innerHTML = this.response;
                alert(this.response);
            }
        }
    }
</script>