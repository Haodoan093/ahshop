<style>
  /* CSS cho form tìm kiếm */
  .search-form {
    margin-left: auto; /* Đặt margin-left thành auto để đẩy form về bên phải */
    margin-right: 250px;
  }
</style>

<nav class="navbar navbar-expand-lg bg-dark w-100" style="height: 78px; width:100%;background-color: #222; position: fixed;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color:white;">AHSHOP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="d-flex search-form" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
