import React, { useState } from "react";
import {
  useLocation,
  Routes,
  Route,
  Link,
} from "react-router-dom";

import Store from "./store";
import HomePage from "./home";
import MnProducts from "./mn_products";
import ProductDetails from "./product_details";
import MnOders from "./mn_order";
import MnCustomers from "./mn_customers";
import MnStatistic from "./mn_statistic";
import AddressCustomer from "./address_customer";
import OderCustomer from "./oder_customer";
import LoginRegister from "./login_register";
import Cart from "./cart";
import Infor_customer from "./infor_customer";
import Footer from './footer';
import AddProduct from "./add_product";

// import 'antd/dist/antd.css';

function App() {
  const location = useLocation();
  console.log(location.pathname);

  return (
    <div className="container" style={{ 'width': '80%' }}>
      <nav className="navbar navbar-expand-lg rounded">
        <div className="container">
          <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
            <span className="navbar-toggler-icon"></span>
          </button>
          <div className="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
            <ul className="navbar-nav" style={{ "fontSize": "14px" }}>
              <li className="nav-item fw-bolder">
                <Link to="/" className={location.pathname === '/' ? 'nav-link active text-white bg-primary' : 'nav-link text-dark'} ><i class="bi bi-house"> </i>Trang chủ</Link>
              </li>
              <li className="nav-item">
                <Link onClick={Store.fetchData} to="/store" className={location.pathname.indexOf('store') == true ? 'nav-link active text-white bg-primary' : 'nav-link text-dark'} ><i class="bi bi-shop"> </i>Cửa hàng</Link>
              </li>
              <li className="nav-item">
                <Link to="/cart" className={location.pathname === '/cart' ? 'nav-link active text-white bg-primary position-relative  ' : 'nav-link text-dark position-relative  '} ><i class="bi bi-basket3"> </i>Giỏ hàng
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    99
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </Link>
              </li>
              {/* <li className="nav-item">
                <Link to="/dashboard" className={location.pathname.indexOf('dashboard') == true ? 'nav-link active text-white bg-primary' : 'nav-link text-dark'} >Dashboard</Link>
              </li> */}
              <li className="nav-item">
                <Link to="/taikhoan" className={location.pathname.indexOf('taikhoan') == true ? 'nav-link active text-white bg-primary' : 'nav-link text-dark'} >Tài khoản</Link>
              </li>
              <li className="nav-item">
                <Link to="/login" className={location.pathname === '/login' ? 'nav-link active text-white bg-primary' : 'nav-link text-dark'} >Đăng nhập</Link>
              </li>
              <li className="nav-item">
                <Link to="/lienhe" className={location.pathname === '/lienhe' ? 'nav-link active text-white bg-primary' : 'nav-link text-dark'} >Liên hệ</Link>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <Routes>
        <Route exact path='/' element={< HomePage />}></Route>
        <Route path='/store' element={< Store />}></Route>
        <Route path='/dashboard/' element={< MnStatistic />}></Route>

        <Route path='/' element={< null />}></Route>

        {/* de route  */}
        <Route path='/store/productdetails' element={< ProductDetails />}></Route>

        <Route path='/dashboard/thongke' element={< MnStatistic />}></Route>

        <Route path='/dashboard/sanpham' element={< MnProducts />}></Route>
        <Route path='/dashboard/sanpham/themsanpham' element={< AddProduct />}></Route>

        <Route path='/dashboard/donhang' element={< MnOders />}></Route>
        <Route path='/dashboard/khachhang' element={< MnCustomers />}></Route>



        <Route path='/login' element={< LoginRegister />}></Route>
        <Route path='/cart' element={< Cart />}></Route>

        {/* quan ly thong tin ca nhan */}
        <Route path='/taikhoan/' element={< Infor_customer />}></Route>
        <Route path='/taikhoan/thongtincanhan' element={< Infor_customer />}></Route>
        <Route path='/taikhoan/diachicanhan/' element={< AddressCustomer />}></Route>
        <Route path='/taikhoan/donhangcanhan/' element={< OderCustomer />}></Route>


      </Routes>
      <Footer ></Footer>
    </div>

  );
}

export default App;

