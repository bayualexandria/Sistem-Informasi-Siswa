import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';

export default function Login(props) {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState(false);
  const [message, setMessage] = useState(false);

  const data = {
    username,
    password,
  };

  const login = async (e) => {
    e.preventDefault();
    setMessage(false);
    setError(false);
    try {
      let response = await fetch(props.endpoint, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
      }).then((res) => res.json());
      console.log(response);
      if (response.status === 400) return setError(response.message);
      if (response.status === 401) return setMessage(response.message);
    } catch (error) {}
  };

  return (
    <div className=" pt-14">
      <div className="flex flex-col items-center justify-center">
        <h3 className="mb-3 font-sans text-lg font-bold text-center text-white">
          LOGIN <br /> Sistem Informasi Admin
        </h3>
        <div className="p-8 bg-white border rounded-md shadow-md border-slate-300 md:w-1/3">
          <div className="flex justify-center mb-8">
            {/* <img src="https://seeklogo.com/images/D/Departemen_Pendidikan_Nasional-logo-E2BD667284-seeklogo.com.png" alt="logo" className="w-1/5"> */}
          </div>
          <div className="p-5">
            {message ? (
              <div className="flex items-center justify-center w-full p-2 text-base font-bold text-white bg-red-500 rounded-md shadow-md">
                {message}
              </div>
            ) : (
              ''
            )}
          </div>

          <form method="POST" onSubmit={login}>
            <div className="w-full px-10 mb-8">
              <label
                htmlFor="nis"
                className="text-base font-normal text-slate-600"
              >
                NIP atau Username
              </label>
              <input
                type="text"
                id="nis"
                className="w-full px-3 py-2 text-black border rounded-md bg-slate-100 focus:outline-none focus:ring-1 <?= $validation->hasError('username') ? 'border-red-500 focus:ring-red-500' : 'border-sky-500 focus:ring-sky-500'; ?>"
                name="username"
                onChange={(e) => setUsername(e.target.value)}
              />
              {error.username ? (
                <span className="flex">
                  <p className="pt-2 font-sans text-xs text-red-500">
                    {error.username}
                  </p>
                </span>
              ) : (
                ''
              )}
            </div>

            <div className="w-full px-10 mb-8">
              <label
                htmlFor="password"
                className="text-base font-normal text-slate-600"
              >
                Password
              </label>
              <input
                type="password"
                id="password"
                className="w-full px-3 py-2 text-black border rounded-md bg-slate-100 focus:outline-none focus:ring-1 <?= $validation->hasError('password') ? 'border-red-500 focus:ring-red-500' : 'border-sky-500 focus:ring-sky-500'; ?>"
                name="password"
                onChange={(e) => setPassword(e.target.value)}
              />
              {error.password ? (
                <span className="flex">
                  <p className="pt-2 font-sans text-xs text-red-500">
                    {error.password}
                  </p>
                </span>
              ) : (
                ''
              )}
            </div>

            <div className="w-full px-10 mb-4">
              <button
                className="w-full px-4 py-2 text-white transition duration-300 rounded-full bg-sky-700 hover:ring hover:ring-sky-300"
                type="submit"
              >
                Login
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  );
}

if (document.getElementById('login-backend')) {
  const item = document.getElementById('login-backend');
  ReactDOM.render(<Login endpoint={item.getAttribute('endpoint')} />, item);
}
