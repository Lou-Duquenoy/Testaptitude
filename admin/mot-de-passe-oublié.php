<!doctype html>
<html lang="fr">
  <head>
    <title>J'ai oublié mon mot de passe</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>
      <div class="container">
          <div class="col-11">
              <div class="card text-center m-4 shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                  <h4 class="card-title p-3">J'ai oublié mon mot de passe</h4>
                    <div class="form-group">
                        <form action="src/forgot.php" method="POST">
                            <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off" required />
                            <button type="submit" class="btn btn-primary btn-lg m-3">Envoyer</button>
                        </form>
                    </div>
                </div>
              </div>
          </div>
      </div>
   
  </body>
</html>