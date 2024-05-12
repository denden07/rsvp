
<div class="reception">

<div class="svg-container">
  <svg style="display: block;" viewBox="0 40 500 90" preserveAspectRatio="xMinYMin meet">
    <path d="M0,100 C150,200 350,0 500,100 L500,00 L0,0 Z" style="stroke: none; fill:white;"></path>
  </svg>
</div>
    <div class="spacer-56"></div>
    <div class="spacer-32"></div>
    <div class="spacer-56"></div>
    <div class="wrapper">
        <div class="form-container" data-aos="flip-left">
        <div class="spacer-56"></div>
            <div id="rsvp" class="reception-wrapper-2" style="overflow-x: hidden">
                <h2 style="font-size: 60px;color: rgba(229,173,173,1)">RSVP</h2>
                <div class="spacer-56"></div>
                <div class="fields">
            <form id="rsvpForm">
            @csrf
                <div class="inputs-group">
                    <div class="group">
                        <input type="text" required name="full_name">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Full name</label>
                    </div>

                    <div class="group">
                        <input type="text" required name="phone">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Contact Number</label>
                    </div>
                </div>

                <div class="select-group">
                    <div class="select">
                        <select class="select-text" required name="plus_one">
                            <option value="" disabled selected></option>
                            <option value="1">No + 1</option>
                            <option value="2">With + 1</option>
                        </select>
                        <span class="select-highlight"></span>
                        <span class="select-bar"></span>
                        <label class="select-label">Plus one</label>
                    </div>

                    <div class="select">
                        <select class="select-text" required name="attendance">
                            <option value="" disabled selected></option>
                            <option value="1">Yes, I will be there</option>
                            <option value="2">No, I can't come</option>
                        </select>
                        <span class="select-highlight"></span>
                        <span class="select-bar"></span>
                        <label class="select-label">Attending</label>
                    </div>
                </div>



                <div class="form__group">
                    <textarea id="message" class="form__field" placeholder="Your Message" rows="6" name="message"></textarea>
                    <label for="message" class="form__label">Your Message</label>
                </div>
                <div class="spacer-56"></div>
                <div class="recaptcha-container">
                    <div class="g-recaptcha" id="rcaptcha"  data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" ></div>
                    <span id="captcha" style="color:red" /></span> <!-- this will show captcha errors -->
                </div>
                <div class="spacer-56"></div>
                <div class="form-button">
                    <button id="button-submit" type="submit" class="primary-button button  no-loading-button">Submit</button>
                    <button id="button-submit" class="primary-button button loading-button hide" disabled>
                        <i class="fa fa-refresh fa-spin" style="margin-right: 5px;"></i>Please wait
                    </button>

                </div>
            </form>
                </div>
            </div>
        <div class="spacer-56"></div>
        </div>
    </div>

    <div class="spacer-56"></div>
    <div class="spacer-56"></div>

</div>

<script src='https://www.google.com/recaptcha/api.js'></script>
<script>

    // Create an instance of Notyf

    document.getElementById('rsvpForm').addEventListener('submit', function(event) {
        let loading = document.getElementsByClassName('loading-button')
        let defaultBtn = document.getElementsByClassName('no-loading-button')

        defaultBtn[0].classList.add('hide');
        defaultBtn[0].classList.remove('show');

        loading[0].classList.add('show');
        loading[0].classList.remove('hide');

        var notyf = new Notyf({
            position: {
                x: 'right',
                y: 'top',
            },
            duration: 3000,
        });
        notyf.success('Please wait');
        event.preventDefault(); // Prevent the default form submission
        setTimeout( () => {
            // Get form data
            var formData = new FormData(this);

            // Send form data to the API route
            fetch('/api/rsvp', {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    // Parse response body as JSON
                    return response.json();
                } else {
                    // If response is not OK, parse error response body as JSON
                    return response.json().then(data => {
                        throw new Error(data.error);
                    });
                }
            })
            .then(response => {
                grecaptcha.reset()
                    notyf.success('Your response have been successfully sent!');
                    defaultBtn[0].classList.remove('hide');
                    defaultBtn[0].classList.add('show');

                    loading[0].classList.add('hide');
                    loading[0].classList.remove('show');
                    this.reset();  // Reset all form data
                    return false; // Prevent page refresh

            })
            .catch(error => {
                defaultBtn[0].classList.remove('hide');
                defaultBtn[0].classList.add('show');

                loading[0].classList.add('hide');
                loading[0].classList.remove('show');
                notyf.error(error.message);
                grecaptcha.reset()

            });
        }, 5000)

    });
</script>

<script>

function get_action(form)
{
    var v = grecaptcha.getResponse();
    if(v.length == 0)
    {
        document.getElementById('captcha').innerHTML="You can't leave Captcha Code empty";
        return false;
    }
    else
    {
         document.getElementById('captcha').innerHTML="Captcha completed";
        return true;
    }
}

</script>
