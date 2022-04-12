<style>
/* ---Footer Start--- */
footer{
    /* position: fixed; */
    margin-top: auto;
    position: bottom;
    padding-top:
    width: 100%;
    background-color: #e4c2c1;
    box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, 
    rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
    text-align: center;
    line-height: 2;
    padding-bottom: 15px;
}

footer .container{
    width: 60%;
    margin: auto;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
}

.box{
    margin-top: 60px;
}

.col{
    padding: 15px;
}

.col img{
    width: 30px;
    height: 30px;
}

.col ul{
    display: flex;
    justify-content: center;
    list-style: none;
}

.col ul li{
    margin: 0px 5px;
}

.col ul li a, .footer_text a{
    text-decoration: none;
    color: #000000;
}

.footer_text{
    margin-top: 15px
}

.payment img{
    width: 70px;
    height: 45px;
}

.table th, td{
    padding: 5px;
    line-height: 0.5;
}

.footer_button{
    background-color: transparent;
    height: 30px;
    border-color: transparent;
    border-radius: 6px;
}

.footer_button::after{
    content:"";
    width: 0px;
    height: 3px;
    display: block;
    margin: auto;
    background: red;
}

.footer_button:hover::after{
    width: 100%;
    transition: 0.3s;
}

.fab::after{
    content:"";
    width: 0px;
    height: 4px;
    display: block;
    margin: auto;
    background: red;
}

.fab:hover::after{
    width: 100%;
    transition: 0.3s;
}
/* ---Footer End--- */
</style>

<!--- Footer Start --->
<footer>
    <div class="box">
    <div class="container">
        <!--- Footer Top Half Left Text Start --->
        <div class="col">
            <h3>Contact Us:</h3>
            <ul>
                <li><i class="fas fa-phone-alt" style="font-size: 24px"></i></li>
                <li><a href="tel:012-3456789">012-3456789</a></li>
            </ul>
            <ul>
                <li><i class="far fa-envelope" style="font-size: 28px"></i></li>
                <li><a href="">Curiousbookstore@gmail.com</a></li>
            </ul>
            <h3>Our Socials:</h3>
            <ul>
                <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook" style="color: #3a5a98; font-size: 30px"></i></a></li>
                <li><a href="https://twitter.com/" target ="_blank"><i class="fab fa-twitter-square" style="color: #258ddd; font-size: 30px"></i></a></li>
                <li><a href="https://www.instagram.com/" target = "_blank"><i class="fab fa-instagram-square" style="color: #E1306C; font-size: 30px"></i></a></li>
            </ul>
        </div>
        <!--- Footer Top Half Left Text End --->

        <!--- Footer Top Half Right Text Start --->
        <div class="payment">
            <h3>We Accept:</h3>
            <table border="0" class="table">
                <tr>
                    <th><img src="images/visa.png" alt="Visa"></th>
                    <th><img src="images/mastercard.png" alt="Mastercard"></th>
                </tr>
                <tr>
                    <th><img src="images/paypal.png" alt="Paypal"></th>
                    <th><img src="images/american_express.png" alt="Boost"></th>
                </tr>
            </table>
        </div>
        <!--- Footer Top Half Right Text End --->
    </div>
    <hr>

    <!--- Footer Bottom Half Text Start --->
    <div class="footer_text">
        <p>© 2022 Copyright by Curious Booktown</p>
        <P><button class="footer_button" onclick="tcFunction()">Terms & Condition</button>&nbsp; &nbsp;|
            &nbsp; &nbsp;<button class="footer_button" onclick="ppFunction()">Privacy Policy</button></p>
    </div>
    <!--- Footer Bottom Half Text End --->

    <script>
        function tcFunction() {
            alert("Terms and conditon\nBy accessing this website we assume you accept these terms and conditions in full.\n\n1. The Products and services available on the Site, and any prizes thereof we may provide to you, are for personal use only.\n\n2. You may not sell or resell any of the products or services, or prizes thereof, you purchase or otherwise received from us.\n\n3. We reserve the right, with or without notice, to cancel or reduce the quantity of any orders that we believe, in our sole discretion, may result in the violation of our Terms and Conditions.\n\n4. Once the books are sold, they are not refundable or exchangable with other products.")
        }
        function ppFunction() {
            alert("Privacy Policy\nBy accessing this website we assume you agree the privacy policy. \n\n1. We have established this Privacy Policy and are providing it to you so that you can understand the manner in which we collect and use your information and the efforts we use to protect it.\n\n2. By personal information we mean information that can be used to identify or contact an individual. \n\n3. Our website makes use of various technologies to collect information about types and versions of internet browsers used when accessing our web site.")
        }
    </script>
    </div>
</footer>
<!--- Footer End --->