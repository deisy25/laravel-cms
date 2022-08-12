<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My WorkExperience</title>

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="/app.css">

        <script src="/app.js"></script>
        
    </head>
    <body>


        <header class="w3-padding">

            <h1 class="w3-text-red">WorkExperience Console</h1>

            <?php if(Auth::check()): ?>
                You are logged in as <?= auth()->user()->first ?> <?= auth()->user()->last ?> | 
                <a href="/console/logout">Log Out</a> | 
                <a href="/console/dashboard">Dashboard</a> | 
                <a href="/">Website Home Page</a>
            <?php else: ?>
                <a href="/">Return to My WorkExperience</a>
            <?php endif; ?>

        </header>

        <hr>

        <section class="w3-padding">

            <h2>Add WorkExperience Record</h2>

            <form method="post" action="/console/workexperiences/add" novalidate class="w3-margin-bottom">

                <?= csrf_field() ?>

                <div class="w3-margin-bottom">
                    <label for="companyName">Company Name:</label>
                    <input type="text" name="companyName" id="companyName" value="<?= old('companyName') ?>" required>
                    
                    <?php if($errors->first('companyName')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('companyName'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="position">position:</label>
                    <input type="text" name="position" id="position" value="<?= old('position') ?>">

                    <?php if($errors->first('position')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('position'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="responsibility">responsibility:</label>
                    <textarea name="responsibility" id="responsibility" required><?= old('responsibility') ?></textarea>
                    <?php if($errors->first('responsibility')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('responsibility'); ?></span>
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

                <button type="submit" class="w3-button w3-green">Add WorkExperience Record</button>

            </form>

            <a href="/console/workexperiences/list">Back to WorkExperience Records list</a>

        </section>

    </body>
</html>