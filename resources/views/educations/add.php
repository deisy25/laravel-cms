<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>My Portfolio</title>
      <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="/app.css">

      <script src="/app.js"></script>
      
   </head>
   <body>
   <header class="w3-padding">

      <h1 class="w3-text-red">Portfolio Console</h1>

      <?php if(Auth::check()): ?>
         You are logged in as <?= auth()->user()->name ?>  | 
         <a href="/console/logout">Log Out</a> | 
         <a href="/console/dashboard">Dashboard</a> | 
         <a href="/">Website Home Page</a>
      <?php else: ?>
         <a href="/">Return to My Portfolio</a>
      <?php endif; ?>

   </header>

   <?php if(session()->has('message')): ?>
         <div class="w3-padding w3-margin-top w3-margin-bottom">
            <div class="w3-red w3-center w3-padding"><?= session()->get('message') ?></div>
         </div>
   <?php endif; ?>

   <section class="w3-padding">
      <h2>Add Education</h2>

      <form method="post" action="/console/educations/add" novalidate class="w3-margin-bottom">

                <?= csrf_field() ?>

                <div class="w3-margin-bottom">
                    <label for="instituteName">Institute Name:</label>
                    <input type="text" name="instituteName" id="instituteName" value="<?= old('instituteName') ?>" required>
                    
                    <?php if($errors->first('instituteName')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('instituteName'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="program">Program:</label>
                    <input type="text" name="program" id="program" value="<?= old('program') ?>">

                    <?php if($errors->first('program')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('program'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="startDate">Start Date:</label>
                    <input type="date" name="startDate" id="startDate" value="<?= old('startDate') ?>" required>

                    <?php if($errors->first('startDate')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('startDate'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="endDate">End Date:</label>
                    <input type="date" name="endDate" id="endDate" value="<?= old('endDate') ?>" required>

                    <?php if($errors->first('endDate')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('endDate'); ?></span>
                    <?php endif; ?>
                </div>

                <button type="submit" class="w3-button w3-green">Add Education Record</button>

            </form>

            <a href="/console/educations/list">Back to Education Records list</a>
      </section>


   </body>
</html>