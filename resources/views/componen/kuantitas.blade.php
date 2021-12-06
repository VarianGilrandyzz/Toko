<div id="list-barang">

</div>

<script>
  const listBarang = document.getElementById("list-barang");

  const item = [];

  function itemObj(id, nama, harga){
    this.id = id
    this.nama = nama
    this.harga = harga
  }

  const additem = (btn) =>{
    const id = btn.getAttribute('data-id');
    const nama = btn.getAttribute('data-nama');
    const harga = btn.getAttribute('data-harga');
    item.push(new itemObj(id,nama,harga));
    displayCart();
  }

  const displayCart = () => {
    let form = ""
    item.forEach(i => {
      form += 
          "<div class='input-group mb-3'>"+
            "<input type='text' class='form-control' placeholder='' aria-label='' aria-describedby='basic-addon1' disabled value='"+i.nama+"'>"+
            "<div class='input-group-prepend'>"+
            "<button class='btn btn-outline-secondary' type='button'>+</button>"+
            "</div>"+
            "<input type='text' value='1' class='form-control' placeholder='' aria-label='' aria-describedby='basic-addon1'>"+
            "<div class='input-group-append'>"+
            "<button class='btn btn-outline-secondary' type='button'>-</button>"+
            "</div>"+
          "</div>"
    console.log("form");
    })
    listBarang.innerHTML = form;
  }
</script>