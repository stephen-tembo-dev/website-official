<div>

    <div class="container mt">

        <h6 class="flow-text center wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"><b>Get in
                touch</b></h6>
        <p class="center wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            Whether you have questions or you would just like to say hello, contact us.
        </p>

        <div class="container mt-sm">

            <div class="row">
                <div style="padding: 20px; border-radius: 19px; margin-top: 20px; visibility: visible; animation-name: fadeIn;"
                    class="col m10 s12 offset-m1 white z-depth-1 wow fadeIn">

                    <form wire:submit.prevent="processemail">

                        <div id="email_info">

                            <div class="row">
                                <div class="input-field col m6 s12">
                                    <input id="name" type="text" class="validate" maxlength="70" value="">
                                    <label for="name" class="active">Your name</label>
                                </div>
                                <div class="input-field col m6 s12">
                                    <textarea id="email" class="materialize-textarea" maxlength="170"></textarea>
                                    <label for="email" class="active">Your email address</label>
                                </div>
                            </div>

                            <div class="row">

                                <div class="input-field col m6 s12">
                                    <textarea id="subject" class="materialize-textarea"></textarea>
                                    <label for="subject" class="active">Subject</label>
                                </div>

                                <div class="input-field col m6 s12">
                                    <textarea id="phone" class="materialize-textarea"></textarea>
                                    <label for="phone" class="active">Your phone number</label>
                                </div>

                            </div>

                            <div class="row">
                                <div class="input-field col m12 s12">
                                    <textarea id="message" class="materialize-textarea">Hi, I would like to ...</textarea>
                                    <label for="message" class="active">Message</label>
                                </div>

                            </div>

                        </div>

                        <button style="border-radius: 8px;" class="btn btn-small waves-effect waves-light black"
                            type="submit" name="action">Send
                            <i class="material-icons right">send</i>
                        </button>

                    </form>
                </div>
            </div>

        </div>

        <p class="center wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            We'll get back to you in 1-2 business days.
        </p>

        <div class="container mt mb">
            <iframe height="400px" width="100%" class="wow fadeIn z-depth-2"
                src="https://www.google.com/maps/embed/v1/place?q=Zambia+University+College+of+Technology+(ZUT),+Kalewa+Road,+Ndola,+Zambia&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
                style="border: 0px; visibility: hidden; animation-name: none;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </div>

</div>
