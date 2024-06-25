<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to Foreign Nurse</title>
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/main.css">
    <link rel="shortcut icon" href="<?= URLROOT; ?>/assets/fav.svg" type="image/x-icon" />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
        background: #fafafa;
        color: #12121F;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }
      .wrapper{
        max-width: 550px;
        margin: auto;
        background-color: #fff;
      }
      .head{
        background-color: #4E73DF;
        padding: 1rem 2rem;
        color: #fff;
        font-weight: 700;
      }
      .content{
        padding: 2rem;
        line-height: 1.5;
      }
      .section{
        margin-bottom: 3rem;
      }
      h3{
        border-bottom: 1px solid #2f2f369c;
      }
    </style>
  </head>
  <body>
  <?= isset($_SESSION[APP]->flashMessage)?Helpers::flashMessage($_SESSION[APP]->flashMessage):"";?>
    <div class="wrapper">
      <div class="head">Notice</div>
      <div class="content">
        <div class="section">
          <h3>Nigerian Residents</h3>
          <h1><b>N</b>6,000/month</h1>
          <p>
            <b>Account Name:</b> <span>Bank Name</span><br />
            <b>Account No.:</b> <span>2983429834</span><br />
            <b>Bank Name:</b> <span>GT Bank</span>
          </p>
        </div>
        <div class="section">
          <h3>US Residents</h3>
          <h1><b>$</b>40/month</h1>
          <p>
            <b>Zelle/CashApp</b><br />
            <span>2983429834</span>
          </p>
        </div>
        <div class="section">
          <h3>Non US/Non African Residents</h3>
          <h1><b>$</b>25/month</h1>
          <p>
            <b>Paypal</b><br />
            <span>https://www.paypal.me/foreignnurse</span>
          </p>
        </div>
        <p class="bottom">
          <span
            >After payment kindly send the following details to
            admin@foreignnurse.come</span>
          <span><b>Evidence of payment (Image), Name or service or class you paid
              for, Whatsapp No.</b></span>
          <span>(<i>Please be patient with us, we will surely get back to you</i>).</span>
        </p>
        <a href="/" style="display: inline-flex;padding: .5rem 1.2rem; background-color: #4E73DF; color: #fff; margin-top: .5rem;text-decoration: none;">Continue</a>
      </div>
    </div>
  </body>
</html>
