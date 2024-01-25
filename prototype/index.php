<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process form data here
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $message = $_POST["message"];

        // Email recipient (change this to your desired email address)
        $recipient = "christen.shubaly.com";

        // Email subject
        $email_subject = "New Contact Form Submission: $subject";

        // Email headers
        $email_headers = "From: $name <$email>";

        // Email message
        $email_message = "Name: $name\n";
        $email_message .= "Email: $email\n";
        $email_message .= "Subject: $subject\n";
        $email_message .= "Age: $age\n";
        $email_message .= "Gender: $gender\n";
        $email_message .= "Message:\n$message";

        // Send the email
        if (mail($recipient, $email_subject, $email_message, $email_headers)) {
            echo "Thank you for your submission!";
        } else {
            echo "Sorry, there was an error sending your message.";
        }
?>


<!DOCTYPE html>
<html lang='en'>
<head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name='author' content='Christen Shubaly'>
        <meta name='email' content='christen.shubaly@protonmail.com'>
        <meta name='date' content='2023-08-31'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans+Extra+Condensed&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="meyer-reset.css">
        <link rel="stylesheet" href="font.css">
        <link rel='stylesheet' href='main.css'>
        <link rel="shortcut icon" href="img/logo-small.png" type="image/x-icon">
        <title>LYSBL</title>
</head>
<body>

    <!-- sticky nav -->
    

    <header id="top">
        <div id="logo-text">
            <img class="logo" src="img/lys_logo.jpg" alt="LYSBL Logo">
        </div>
    </header>

    

    <!-- normal nav -->
    <div class="nav" id="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-btn" id="navBtn">
            <label for="nav-check">
                <span>☰</span>
            </label>
        </div>
        <div class="nav-links">
            <li><a href='index.html#home'>Home</a></li>
            <li><a href='index.html#services'>Services</a></li>
            <!-- <li><a href='index.html#gift_cards'>Gift Cards</a></li> -->
            <li><a href='index.html#contact'>Contact Us</a></li>
        </div>
    </div>

    

    <aside aria-label="Love Your Self Beauty Lounge Images">
        <div class="carousel" data-carousel>
            <button class="carousel-button prev" data-carousel-button="prev">&#x219e;</button>
            <button class="carousel-button next" data-carousel-button="next">&#x21a0;</button>
            <ul data-slides>
                <li class="slide" data-active>
                    <img src="img/enhancement/white-table-and-chairs.jpg" alt="White Table And Chairs" >
                </li>
                <li class="slide">
                    <img src="img/enhancement/chairs.jpg" alt="White Table And Chairs">
                </li>
                <li class="slide">
                    <img src="img/enhancement/bench.jpg" alt="White Table And Chairs">
                </li>
                <li class="slide">
                    <img src="img/enhancement/lounge.jpg" alt="White Table And Chairs">
                </li>
                <li class="slide">
                    <img src="img/enhancement/nail-polish.jpg" alt="White Table And Chairs">
                </li>
            </ul>
        </div>
    </aside>
    
    <main>
        <section aria-details="About information" id="home" class="home">
            <p>Love Your Skin Beauty Lounge is a modern full service spa located in the heart of Ottawa. Our team provides a professional touch to every service we offer and it is our goal to make sure you have the best possible service during your visit with us.</p><br>

            <p>Come for a visit, we guarantee you will Love Your Skin when you do.</p><br>

            <p>See you soon.</p><br>
        </section>
        <section aria-details="Services" class="services" id="services">
            
            <article aria-details="Laser hair removal">
                <h1>Laser Hair Removal</h1>
                <p>We offers the state of the art LightSheer Duet Laser. This is the most advance laser on the market today, which allows you to have hair removed in a safe, fast and virtually painless way. The LightSheer Duet is the laser industry’s gold standard in ultra fast, safe and comfortable hair removal. Our new high speed LightSheer Duet with its dramatically increased spot size and combined with an innovative vacuum assist technology enables you to have larger hair removal areas treated in less time.</p><br>

                <p>For Laser Hair Removal Pricing and Packages: Call <a class="tel" href="tel:6135650111">613.565.0111</a> for your Free Laser Hair Removal Consultation</p>
            </article>
            
            <article aria-details="skincare">
                <h1>Skincare</h1>
                <div class="skincare-items" id="skincare_items">
                    <div class="item">
                        <h2>Customized Facial <b>150</b></h2>
                        <p>This high performance facial is the ultimate customised treatment to relax.</p>
                        <p>Products are chosen for your specific skin type. Feel calm and revitalised with a beautiful, healthy glow. 90min</p>
                    </div>
                    <div class="item">
                        <h2>Purifying Facial <b>135</b></h2>
                        <p>This facial clears all impurities. Used to target oily, acne and asphyxiated skin. Restores natural balance of the skin while evening your skin tone and promoting new cell growth. 60min</p>
                    </div>
                    <div class="item">
                        <h2>Just In Time Facial <b>85</b></h2>
                        <p>The perfect facial to give your skin exactly what it needs in a hurry. includes cleanse, exfoliation, hydrating mask and creams to finish. 40min</p><br>
                        <p class="addon">ADD EYE TREATMENT WITH FACIAL <b>40</b></p>
                    </div>
                    <div class="item">
                        <h2>Chemical Peel <b>200</b></h2>
                        <p>Removes dead skin cells and stimulate the growth of new cells. The aim is to improve the appearance of skin texture, hyperpigmentation, fine lines, enlarged pores, acne and scarring.</p>
                    </div>
                    <div class="item">
                        <h2>Microdermabrasion + Mask <b>150</b></h2>
                        <p>Microdermabrasion treatment is a minimal abrasive instrument to gently sand your skin, removing the uneven outer layer, and has many benefits. Improves age spots blackheads, hyperpigmentation, lessen the appearance of stretch marks, reduces fine lines and wrinkles, reduces or eliminate enlarged pores and the scars left by acne.</p>
                    </div>
                    <div class="item">
                        <h2>Dermaplaning + Mask <b>85</b></h2>
                        <p>Dermaplaning is an effective and safe way to exfoliate the skin. A sterile surgical scalpel gently glides over the face, which removes the peach-fuzz and dead skin cells. This process results in softer, smoother and brighter skin along with many other benefits such as: improved skin texture, improved product penetration, reduces fine lines / wrinkles, reduces hyperpigmentation, reduces acne scars and the occurrence of acne, and allows for a smoother application of makeup.</p>
                    </div>
                </div>
                
            </article>
            <article aria-details="Nails">
                <h1>Nails</h1>
                <div class="nail-items" id="nail_items">
                    
                    <div class="item">
                        <h2>Manicure <b>45</b></h2>
                        <p>Includes nail trimming, shaping + buffing, and cuticle care. Finishing with a hand + arm massage and a polish colour of your choice.</p>
                    </div>

                    <div class="item">
                        <h2>No Polish Manicure <b>40</b></h2>
                        <p>Includes nail trimming, shaping + buffing, and cuticle care. Finishing with a hand + arm massage.</p>
                    </div>

                    <div class="item">
                        <h2>Spa Manicure <b>55</b></h2>
                        <p>Includes nail trimming, shaping + buffing, and cuticle care. Finishing with an exfoliating scrub, moisturizer mask and hand + arm massage a nail polish colour of your choice.</p>
                    </div>

                    <div class="item">
                        <h2>Shellac Manicure <b>50</b></h2>
                        <p>Includes nail trimming, shaping + buffing, and the removal of cuticle build up from the natural nail plate. Finishing with a hand + arm massage and shellac polish</p><br>

                        <p class="addon">Shellac Add On <b>15</b></p><br>
                        <p class="addon">Shellac French Add On <b>18</b></p><br>
                        <p class="addon">Shellac Removal <b>10</b></p><br>
                        <p class="addon">Shellac Removal Done By Us Complimentary</p>
                    </div>

                    <div class="item">
                        <h2>Pedicure <b>65</b></h2>
                        <p>Beginning with an herbal foot soak, our pedicure includes nail trimming, shaping + buffing, and cuticle care. Callouses and dry skin are softened and buffed to help smooth the soles of the feet. Finishing with a foot + leg massage and nail polish of your choice.</p>
                    </div>

                    <div class="item">
                        <h2>Spa Pedicure <b>85</b></h2>
                        <p>Beginning with a herbal foot soak,our pedicure includes nail trimming, shaping + buffing,And the removal of the cuticle buildup from the natural nail plate. Calluses and dry skin are softened and buffed to help smooth the soles of the feet. Finishing with an exfoliating scrub, hydrating mask and a foot + Leg massage and nail Polish of your choice.</p>

                    </div>
                    <div class="item">
                        <h2>Shellac Pedicure <b>75</b></h2>
                        <p>Beginning with an herbal foot soak, our pedicure includes nail trimming, shaping + buffing, and the removal of cuticle build up from the natural nail plate. Callouses and dry skin are softened and buffed to help smooth the soles of the feet. Finishing with a foot + leg massage and shellac gel nail polish of your choice.</p>
                    </div>
                    <div class="item">
                        <h2>Toe Pedicure <b>45</b></h2>
                        <p>Beginning with an herbal foot soak, our toe pedicure includes nail trimming, shaping + buffing, and the removal of cuticle build up from the natural nail plate. Finishing with polish of your choice.</p>
                    </div>

                    

                    <div class="item">
                        <h2>Bio Sculpture Gel Nails</h2>
                        <p>Bio Sculpture is a specific gel-like treatment which has the added benefit of acting like a protective layer while stimulating overall nail health at the same time. Because of this, Bio Sculpture is generally considered one of the best options for your nails, where its composition contains vitamins and minerals which promote strength and length.</p>

                        <p class="addon">Bio Sculptures gel Overlay <b>65</b></p><br>
                        <p class="addon">Bio Sculpture gel extension <b>85</b></p><br>
                        <p class="addon">Bio Sculpture fill <b>55</b></p><br>
                    </div>
                </div>
            </article>
            <article aria-details="Lashes">
                <h1>Lashes</h1>
                <div class="lash-items" id="lash_items">
                    <div class="item">
                        <h2>Lash Tint <b>30</b></h2>
                        <p>A semi permanent tint for the eyelashes making them appear darker and more visible. Results last 4 weeks</p>
                    </div>
                    <div class="item">
                        <h2>Lash Lift + Tint <b>85</b></h2>
                        <p>Lash lift and semi-permanent tint. Designed to replace your eyelash curler and mascara. The lash lift + tint chemically lifts and tints your lashes making them appear longer and darker. Lift results last 6 weeks.</p>
                    </div>
                    <div class="item">
                        <h2>Eyelashes Extension</h2>
                        <p>Eyelash extensions are semi- permanent fibres that are glued to your natural lashes to make them appear longer, thicker and darker.</p><br>
                        <p class="addon">Full Set <b>140</b></p><br>
                        <p class="addon">Fill <b>65</b></p><br>
                    </div>
                </div>
            </article>
            <article aria-details="Brows">
                <h1>Brows</h1>
                <div class="brow-items" id="brow_items">
                    <div class="item">
                        <h2>Brow Shaping <b>25</b></h2>
                        <p>A classic freehand brow wax.</p>
                    </div>
                    <div class="item">
                        <h2>Brow Tint <b>30</b></h2>
                        <p>A semi-permanent brow tint. Tint results last approximately 4 weeks on the hair.</p>
                    </div>
                    <div class="item">
                        <h2>Brow Tint And Shaping <b>50</b></h2>
                        <p>Brow waxing and semi-permanent brow tint. Tint results last approximately 4 weeks on the hair.</p>
                    </div>
                    <div class="item">
                        <h2>Brow Lamination <b>80</b></h2>
                        <p>Brow lamination involves the perming of you eyebrow hairs to keep them in place and provide a fuller, more even look</p>
                    </div>
                </div>
            </article>
            <article aria-details="Wax">
                <h1>Wax</h1>
                <div class="wax-items" id="wax_item">
                    <div class="item">
                        <h2>Regular Bikini <b>30</b></h2>
                        <p>Removes unwanted body hair from outside of the bikini line.</p>
                    </div>
                    <div class="item">
                        <h2>Extended Bikini <b>45</b></h2>
                        <p>Removes a little more than just the traditional bikini.</p>
                    </div>
                    <div class="item">
                        <h2>Brazilian Bikini <b>60</b></h2>
                        <p>Removes any and all unwanted body hair from the bikini area.</p>
                    </div>
                    <div class="item">
                        <h2>Brazilian Bikini <b>75</b></h2>
                        <p>Removes a little more than just the traditional bikini.</p>
                    </div>
                    <div class="item">
                        <h2>Rio Bikini <b>75</b></h2>
                        <p>Removes all unwanted body hair from front to back, including the cheeks and between the cheeks.</p>
                    </div>
                    <div class="item">
                        <h2>Full Leg <b>70</b></h2>
                        <p>Removes all hair from both the upper and lower legs.</p>
                    </div>
                    <div class="item">
                        <h2>Full Leg And Bikini <b>85</b></h2>
                        <p>Removes all hair from all legs and bikini area.</p>
                    </div>
                    <div class="item">
                        <h2>Full Leg And Brazilian <b>100</b></h2>
                        <p>Removes all hair from all legs and bikini area.</p>
                    </div>
                    <div class="item">
                        <h2>Lower Leg <b>45</b></h2>
                        <p>Remove all unwanted leg hair form lower legs.</p>
                    </div>
                    <div class="item">
                        <h2>Upper Leg <b>55</b></h2>
                        <p>Remove all unwanted leg hair from upper legs.</p>
                    </div>
                    <div class="item">
                        <h2>Stomach <b>40</b></h2>
                        <p>Remove unwanted stomach hair.</p>
                    </div>
                    <div class="item">
                        <h2>Full Arms <b>55</b></h2>
                        <p>Remove all unwanted arm hair from all arm areas.</p>
                    </div>
                    <div class="item">
                        <h2>Underarm<b>30</b></h2>
                        <p>Remove all unwanted hair from underarms</p>
                    </div>
                    <div class="item">
                        <h2>Half Arm <b>40</b></h2>
                        <p>Remove unwanted from lower arms.</p>
                    </div>
                    <div class="item">
                        <h2>Lip / Chin <b>20</b></h2>
                        <p>Remove hair wanted hair from around the mouth</p>
                    </div>
                    <div class="item">
                        <h2>Full Face <b>40+</b></h2>
                        <p>Remove all unwanted hair from the face.</p>
                    </div>
                    <div class="item">
                        <h2>Nostril <b>20</b></h2>
                        <p>Remove unwanted hair from the nostrils.</p>
                    </div>
                    <div class="item">
                        <h2>Chest And Shoulders <b>50+</b></h2>
                        <p>Remove unwanted hair from the chest and shoulder areas.</p>
                    </div>
                    <div class="item">
                        <h2>Back <b>50+</b></h2>
                        <p>Remove unwanted hair from the back area.</p>
                    </div>
                </div>
            </article>
            <article aria-details="Makeup">
                <h1>Make-Up</h1>
                <div class="makeup-items" id="makeup_items">
                    <div class="item">
                        <h2>Full Face <b>75</b></h2>
                    </div>
                    <div class="item">
                        <h2>Eyes, Lips and Cheeks <b>45</b></h2>
                    </div>
                    <div class="item">
                        <h2>Lesson <b>90</b></h2>
                    </div>
                    <div class="item">
                        <h2>Bridal Make-Up Package <b>150 (Includes Trial)</b></h2>
                    </div>
                </div>
            </article>
            <article aria-details="spray tan">
                <h1>Spray Tans</h1>
                <div class="spraytan-items" id="spraytan_items">
                    <div class="item">
                        <h2>Spray Tan <b>55</b></h2>
                        <p>Your Dream Tan Awaits</p>
                        <p>Formulated with skin-loving ingredients, that will offer you a natural-looking complexion while leaving your skin hydrated, radiant and bronzed</p>

                        <ul class="details" id="details">
                            <li class="detail">NATURAL INGREDIENTS</li>
                            <li class="detail">VEGAN & CRUELTY-FREE</li>
                            <li class="detail">PARABEN-FREE</li>
                            <li class="detail">GLUTEN-FREE</li>
                            <li class="detail">SULFATE-FREE</li>
                        </ul>
                    </div>
                </div>
            </article>
        </section>
        <section aria-details="Gift Cards" id="gift_cards" class="gift-cards">
            <!-- forms in carousel -->
            <!-- <div class="gift-forms-container" id="gift_forms_container">
                <h1>Gift Cards</h1>
                <form>
                    <div id="gc-type">
                        <input type="radio" name="gc-type" id="cash" checked>
                        <label for="cash">Cash</label>
                    
                        <input type="radio" name="gc-type" id="voucher">
                        <label for="voucher">Voucher</label>
                    </div>
                    <div class="gc-cash-container">
                        <select name="gc-cash" id="gc_cash" class="gc-cash">
                            <option value=""><b>$25</b></option>
                            <option value=""><b>$50</b></option>
                            <option value=""><b>$75</b></option>
                            <option value=""><b>$100</b></option>
                            <option value=""><b>$125</b></option>
                            <option value=""><b>$150</b></option>
                            <option value=""><b>$175</b></option>
                            <option value=""><b>$200</b></option>
                        </select>
                    </div>
                    <div class="gc-services-container">
                        <select name="gc-services" id="gc_services" class="gc-services">
                            <option value="customized facial">CUSTOMIZED FACIAL - $150</option>
                            <option value="purifying facial">PURIFYING FACIAL - $135</option>
                            <option value="just in time facial">JUST IN TIME FACIAL - $85</option>
                            <option value="chemical peel">CHEMICAL PEEL - $200</option>
                            <option value="microdermabrasion and mask">MICRODERMABRASION + MASK - $150</option>
                            <option value="dermaplaning + mask">DERMAPLANING + MASK - $85</option>
                            <option value="manicure">MANICURE - $45</option>
                            <option value="spa manicure">SPA MANICURE - $55</option>
                            <option value="no polish manicure">NO POLISH MANICURE - $40</option>
                            <option value="shellac manicure">SHELLAC MANICURE - $50</option> 
                            <option value="pedicure">PEDICURE - $65</option>
                            <option value="">SPA PEDICURE - $85</option>
                            <option value="shellac pedicure">SHELLAC PEDICURE - $75</option>
                            <option value="toe pedicure">TOE PEDICURE - $45</option>
                            <option value="bio sculpture gel nails">BIO SCULPTURE GEL NAILS</option> 
                            <option value="lash tint">LASH TINT - $30</option>
                            <option value="lash lift + tint">LASH LIFT + TINT - $85</option>
                            <option value="eyelashes extension">EYELASHES EXTENSION</option> 
                            <option value="brow shaping">BROW SHAPING - $25</option>
                            <option value="brow tint">BROW TINT - $30</option>
                            <option value="brow tint and shaping">BROW TINT AND SHAPING - $50</option>
                            <option value="brow lamination">BROW LAMINATION - $80</option>
                            <option value="regular bikini">REGULAR BIKINI - $30</option>
                            <option value="extended bikini">EXTENDED BIKINI - $45</option>
                            <option value="brazilian bikini">BRAZILIAN BIKINI - $60</option>
                            <option value="rio bikini">RIO BIKINI - $75</option>
                            <option value="full leg">FULL LEG - $70</option>
                            <option value="full leg and bikini">FULL LEG AND BIKINI - $85</option>
                            <option value="full leg and brazilian">FULL LEG AND BRAZILIAN $100</option>
                            <option value="lower leg">LOWER LEG - $45</option>
                            <option value="upper leg">UPPER LEG - $55</option>
                            <option value="stomach">STOMACH - $40</option>
                            <option value="full arms">FULL ARMS - $55</option>
                            <option value="half arm">HALF ARM - $40</option>
                            <option value="lip / chin">LIP / CHIN - $20</option>
                            <option value="full face">FULL FACE - $40+</option>
                            <option value="nostril">NOSTRIL - $20</option>
                            <option value="chest and shoulders">CHEST AND SHOULDERS - $50+</option>
                            <option value="back">BACK - $50+</option>
                            <option value="full face">FULL FACE - $75</option>
                            <option value="eyes, lips and cheeks">EYES, LIPS AND CHEEKS - $45</option>
                            <option value="lesson">LESSON - $90</option>
                            <option value="bridal make-up package">BRIDAL MAKE-UP PACKAGE - $150</option>
                            <option value="spray tan">SPRAY TAN - $55</option>
                        </select>
                    </div>
                    <button type="submit" id="cardSub">Check Out</button>
                </form> -->
            </div>
        </section>
    </main>
    <footer id="contact" aria-details="contact information">
        <iframe class="map" style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJaWqUIaMFzkwR7Pg7SETw6o4&key=AIzaSyAy3eQfAo_yO5jsSUkz3zd43fAEbVPpTmg"></iframe>
       

        <div class="info">
            <div class="hours" id="hours">
                <h2>Hours</h2>
                <ul>
                    <li>Sunday closed</li>
                    <li>Monday closed</li>
                    <li>Tuesday 9-6</li>
                    <li>Wednesday 9-6</li>
                    <li>Thursday 10-7</li>
                    <li>Friday 10-7</li>
                    <li>Saturday 9-5</li>
                </ul>
            </div>
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="contact-form" id="contactForm">
        <h2>Contact Us</h2>
        <div>
            <fieldset>
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="John Doe">
            </fieldset>

            <fieldset>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="johnjoe@gmail.com">
            </fieldset>

            <fieldset>
                <label for="subject">Subject</label>
                <input type="text" name="subject" placeholder="Email subject line">
            </fieldset>

            <fieldset>
                <label for="age">Age</label>
                <input type="number" name="age" value="18">
            </fieldset>

            <fieldset>
                <label for="gender">Sex</label>
                <div class="sex">
                    <div>
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id="male" value="male" checked>
                    </div>
                    <div>
                        <label for="female">Female</label>
                        <input type="radio" name="gender" id="female" value="female">
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="5"></textarea>
            </fieldset>
        </div>
        <button type="submit">Send</button>
    </form>
</body>
</html>
<?php
}
?>

        <div class="local">
            <p>
                Conveniently located in East Ottawa.
            </p>
            
            <address>
                97 Main St. Ottawa Ontario K1S 1B7
            </address>

            <div>
                <a href="tel:6135650111">613-565-0111</a>
                <a href="mailto:info@lysbl.ca">info@lysbl.ca</a>
            </div>

            <a href="https://www.facebook.com/lysbeautylounge/?fref=ts"><img class="soci" src="img/facebook.svg" alt="facebook icon"></a>
            <a href="https://www.instagram.com/loveyourskin_beautylounge/"><img class="soci" src="img/instagram.svg" alt="instagram"></a>

            
            <p>© 2023 Love Your Skin Beauty Lounge</p>
        </div>
    

        
        
        
        
    </footer>

    <div class="top">
        <p><a href='#'>🛒</a></p>
    </div>
    
   <script>
        //nav
        window.addEventListener('scroll', function() {
            // Calculate scroll percentage
            const scrollPercentage = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
        
            // Example: Adjust z-index based on scroll percentage
            const stickNav = document.getElementById('nav');
            
            if (scrollPercentage < 1) {
                stickNav.style.zIndex = 1;
                stickNav.style.position = 'relative'; // Change to relative position
            } else {
                stickNav.style.zIndex = 2;
                stickNav.style.position = 'fixed'; // Change to fixed position
                stickNav.style.top = '0';
            }
        });
    
        const $gc_cash = document.getElementById('gc_cash')
        const $gc_services = document.getElementById('gc_services')
        const $gc_type = document.getElementById('gc-type')
        const $cash = document.getElementById('cash')
        const $voucher = document.getElementById('voucher')


        const $gcCashContainer = document.querySelector('.gc-cash-container')
        const $gcServicesContainer = document.querySelector('.gc-services-container')

        if ($cash.checked) {
            $gcCashContainer.style.display = 'block'
            $gcServicesContainer.style.display = 'none'
        } else {
            $gcCashContainer.style.display = 'none'
            $gcServicesContainer.style.display = 'block'
        }
        
        $gc_type.addEventListener('change', () => {
            if ($cash.checked) {
                $gcCashContainer.style.display = 'block'
                $gcServicesContainer.style.display = 'none'
            } else {
                $gcCashContainer.style.display = 'none'
                $gcServicesContainer.style.display = 'block'
            }
        })

        //carousel
        const buttons = document.querySelectorAll("[data-carousel-button]");
const nextButton = document.querySelector("[data-carousel-button='next']");

buttons.forEach(button => {
    button.addEventListener("click", () => {
        moveCarousel(button);
    });
});

function moveCarousel(button) {
    const offset = button.dataset.carouselButton === "next" ? 1 : -1;
    const slides = button.closest("[data-carousel]").querySelector("[data-slides]");
    const activeSlide = slides.querySelector("[data-active]");
    let newIndex = [...slides.children].indexOf(activeSlide) + offset;
    
    if (newIndex < 0) newIndex = slides.children.length - 1;
    if (newIndex >= slides.children.length) newIndex = 0;

    slides.children[newIndex].dataset.active = true;
    delete activeSlide.dataset.active;
}

// Automatically move to the next image every 3.5 seconds
    let intervalId;

    function startAutoCarousel() {
        intervalId = setInterval(() => {
            moveCarousel(nextButton);
        }, 7000);
    }

    function stopAutoCarousel() {
        clearInterval(intervalId);
    }

    startAutoCarousel();

    // Stop auto-carousel on button click
    buttons.forEach(button => {
        button.addEventListener("click", () => {
            stopAutoCarousel();
            startAutoCarousel();
        });
    });


    // email form
    document.getElementById("contactForm").addEventListener("submit", function (event) {
        event.preventDefault();
        sendEmail();
    });

    function sendEmail() {
        const name = document.getElementsByName("name")[0].value;
        const email = document.getElementsByName("email")[0].value;
        const subject = document.getElementsByName("subject")[0].value;
        const age = document.getElementsByName("age")[0].value;
        const gender = document.querySelector('input[name="gender"]:checked').id;
        const message = document.getElementById("message").value;
        const mailtoLink = `mailto:christen.shubaly@gmail.com?subject=${subject}&body=Name: ${name}%0AEmail: ${email}%0ASubject: ${subject}%0AAge: ${age}%0AGender: ${gender}%0AMessage: ${message}`;
        window.location.href = mailtoLink;
    }

        
   </script>
</body>
</html>