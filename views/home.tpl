<form name="frmRegistration" method="post" action="">
    <div class="demo-table">
        <div class="form-head">%title%</div>
        <div class="%message%">
            <p>%response%</p>
            <div>
                %list_error%
            </div>
        </div>
        <div class="field-column">
            <label>Credit card number</label>
            <div>
                <input type="number" class="demo-input-box"
                       min="0"
                       name="credit_card_number"
                       value="%credit_card_number%"
                       placeholder="378282246310005">
            </div>

            <label>Expiration date</label>
            <div>
                <input type="text" class="demo-input-box"
                       name="expiration_date"
                       value="%expiration_date%"
                       placeholder="01/20">
            </div>

            <label>CVV2</label>
            <div>
                <input type="number" class="demo-input-box"
                       min="0"
                       name="cvv"
                       value="%cvv%"
                       placeholder="123">
            </div>

            <label>Email</label>
            <div>
                <input type="email" class="demo-input-box"
                       name="email"
                       value="%email%"
                       placeholder="placeholder@gmail.com">
            </div>

        </div>

        <div class="field-column">
            <label>Phone number</label>
            <div>
                <input type="text" class="demo-input-box"
                        name="phone" value="%phone%"
                        placeholder="+38(093)-123-45-67">
            </div>
        </div>

        <div class="field-column">
                <input type="submit"
                       name="register-user" value="Validation"
                       class="btnRegister">
            </div>
        </div>
    </div>
</form>