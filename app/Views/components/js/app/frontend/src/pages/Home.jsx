import React, { useState } from "react";
import { Link } from "react-router-dom";
import Menu from "../../components/Menu/Menu";

function Home() {
  const [showMenu, setShowMenu] = useState(false);

  const menuShow = () => {
    setShowMenu(!showMenu);
  };

  return (
    // <div>
    //   <Modal setShow={setShowLogout} show={showLogout} />
    //   <Link to="/login">Login</Link>
    //   <p>Home</p>
    //   <button onClick={modalShow}>Logout</button>
    // </div>
    <div>
      <section className="absolute flex items-center justify-center w-full h-screen bg-gradient-to-r from-sky-500/70 to-indigo-500/70">
        <img
          src="https://seeklogo.com/images/D/Departemen_Pendidikan_Nasional-logo-E2BD667284-seeklogo.com.png"
          alt=""
          className="fixed w-1/2 contrast-50 md:w-1/4 lg:w-1/6"
        />
      </section>
      <Menu show={showMenu} setShow={setShowMenu} />
      <footer className="fixed bottom-0 w-full bg-light-primary">
        <div className="flex flex-row items-center justify-between p-2 text-sm font-bold border-t border-b-0 shadow-md text-slate-500">
          <button
            className={`${
              showMenu ? "ring ring-sky-200 bg-sky-400" : ""
            } w-10 h-10 p-1 transition duration-75 border rounded-full shadow-md shadow-slate-500 border-slate-100 hover:ring hover:ring-sky-200`}
            onClick={menuShow}
          >
            <img
              src="https://seeklogo.com/images/D/Departemen_Pendidikan_Nasional-logo-E2BD667284-seeklogo.com.png"
              alt="logo"
              className="w-8 rounded-full"
            />
          </button>
          <div id="time" className="hidden md:block"></div>
          <p>Hello,Bayu Wardan Selamat Datang!</p>
        </div>
      </footer>
    </div>
  );
}

export default Home;
