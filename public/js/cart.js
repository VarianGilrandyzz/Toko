myStorage = window.sessionStorage;

class Cart{
  constructor(){
    this.SESSION_NAME = 'cart';
    this.cart = [];
    this.cartUpdate();
  }

  getFromSession(){
    return JSON.parse(sessionStorage.getItem(this.SESSION_NAME))
  }

  sessionUpdate() {
    sessionStorage.setItem(this.SESSION_NAME, JSON.stringify(this.cart));
  }

  //update data dari session ke array
  cartUpdate()  {
    if (this.getFromSession() !== null) {
      this.cart = this.getFromSession();
    }
  }

  //tambah item baru
  addCart(id, nama, harga) {
    if (!this.isItemInCart(id)) {
      this.cart.push({
        id:id,
        nama:nama,
        harga:harga
      })
      this.sessionUpdate();
    }
  }

  //hapus item pada cart
  //parameter id barang
  removeItemCart(id) {
    this.cart = this.cart.filter(cart=>cart.id!==id);
    this.sessionUpdate();
  }

  //menghapus data session dan cart
  clearCart()  {
    this.cart = [];
    sessionStorage.removeItem(this.SESSION_NAME);
  }

  getCart()  {
    return this.cart;
  }

  //cek apakah item ada di dalam cart
  isItemInCart(id){
    const result = this.cart.find( cart => cart.id === id);
    return (result!=null?true:false);
  }

  cartCount(){
    return this.cart.length
  }
}