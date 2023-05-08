<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eurua project</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    <div class="cnt">
        <div class="frm">
            @error('message')
                <h2>Credenciales incorrectas</h2> <br>
            @else
                <h2>Bienvenido</h2> <br>
            @enderror
            <form method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Usuario" id="user" name="user"  autofocus required>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Contraseña" id="password" name="password" required>
                    <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-arrow-right"></i></button>
                </div>
            </form> <br>
            <label style="font-size:8px">coleguitas.team/eurua</label>
        </div>
    </div>
</body>
</html>

<style type="text/css">
    body {
        margin: 0px;
        height: 100%;
        background-repeat: no-repeat;
        background: url(../img/bg-login.png) no-repeat center center fixed;
        background-size: 100% 100%;
        background-color: #f0f4f7;
        font-family: 'Segoe UI';
    }

    .cnt{
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;       
    }

    .frm{
        width: 222px;
        align-content: center;    
    }
</style>