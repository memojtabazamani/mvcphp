<form method="POST" action="http://mvcphp.test/users/register">
    <div>
        <input
                type="text"
                name="name"
                placeholder="Name"
        >
    </div>

    <br>

    <div>
        <input
                type="text"
                name="email"
                placeholder="Email"
        >
    </div>

    <br>

    <button>
        Register
    </button>
    <hr>
    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $mainError): ?>

                    <?php foreach ($mainError as $error) {
                        echo "<li>" . $error . "</li>\n"; ;
                    }

                    ?>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</form>