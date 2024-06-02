<template>
  <header>
    <nav class="navbar dark navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><RouterLink to="/home" class="custom-link">Home</RouterLink></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">HOLA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a v-if="logedIn" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <div>
      <nav>
        <RouterLink to="/" class="custom-link">Login</RouterLink>
        <RouterLink to="/home" class="custom-link">Home</RouterLink>
      </nav>
    </div>
  </header>

  <RouterView />
</template>
<script>
export default {
  name: 'App',
  data() {
    return {
      logedin: false,
    };
  },
}
</script>

<style scoped>
.custom-link {
  color: #0c0301; /* Cambia el color a un tono de rojo */
  text-decoration: none; /* Remueve el subrayado */
}

.custom-link:hover {
  color: #ff4500; /* Cambia el color en hover */
}
</style>
