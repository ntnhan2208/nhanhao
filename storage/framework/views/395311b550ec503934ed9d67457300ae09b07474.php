<html>
<head>
    <title></title>
</head>
<body>
<form method="POST" action="<?php echo e(route('user.login')); ?>">
    <?php echo csrf_field(); ?>
    <input type="text" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">
    <button type="submit">Login</button>
</form>
</body>
</html><?php /**PATH D:\TP Tech\chinhchubds\be\chinhchubds\resources\views/user/auth1/login.blade.php ENDPATH**/ ?>