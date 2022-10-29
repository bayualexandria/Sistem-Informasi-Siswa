import React, { useState, useEffect } from "react";
import { Navigate, Route } from "react-router-dom";
import Network from "../../../components/Network/Network";

function Login() {
  const [nis, setNis] = useState("");
  const [password, setPassword] = useState("");
  const [show, setShow] = useState(false);
  const [loading, setLoading] = useState(false);
  const [message, setMessage] = useState("");
  const [error, setError] = useState("");

  const data = { username: nis, password };

  const onHandlerSubmit = async (e) => {
    e.preventDefault();
    setMessage("");
    setError("");
    try {
      let response = await fetch("/api/login", {
        method: "POST",
        body: JSON.stringify(data),
        headers: {
          "Content-Type": "application/json",
        },
      }).then((res) => res.json());
      setLoading(true);
      setTimeout(() => {
        setLoading(false);
        if (response.status === 400) return setMessage(response.message);
        if (response.status === 401) return setError(response.message);
        localStorage.setItem("authentication", [
          response.token,
          response.user.no_induk,
        ]);
        return (location.href = "/");
      }, 5000);
    } catch (e) {
      console.log(e);
    }
    console.log(data);
    setLoading(true);
  };

  const showPassword = () => {
    setShow(!show);
  };

  return (
    <>
      <Network />
      <div className="flex flex-col py-10 md:flex-row items-center justify-center h-screen px-10 gap-x-36 bg-slate-100">
        <div className="md:w-2/4 p-10 bg-white rounded-md shadow-md">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis
          dolorem deserunt reiciendis delectus provident odio quidem nesciunt
          alias nostrum ipsum est consectetur qui aliquam animi rerum eius
          dicta, quae illo saepe natus minus, dignissimos quia dolores nemo!
          Repellendus, explicabo aspernatur deleniti unde, quia at vel ipsam
          eos, similique eius corporis?
        </div>

        <div className="w-1/3 flex flex-col gap-y-5">
          {error ? (
            <div className="py-3  flex justify-center items-center rounded-md shadow-md bg-rose-400">
              <p className="text-sm font-bold text-white">{error}</p>
            </div>
          ) : (
            ""
          )}
          <div className="p-10 bg-white rounded-md shadow-md">
            <form onSubmit={onHandlerSubmit} className="flex flex-col gap-y-5 ">
              <div className="flex flex-col gap-y-2">
                <label
                  htmlFor="nis"
                  className="text-base font-normal text-slate-500"
                >
                  No.Induk
                </label>
                <input
                  type="text"
                  onChange={(e) => setNis(e.target.value)}
                  className="border border-blue-500 rounded-md shadow-md outline-none py-1.5 px-4 hover:ring hover:ring-blue-300"
                />
                {message.username ? (
                  <p className="text-red-500 text-xs">{message.username}</p>
                ) : (
                  ""
                )}
              </div>
              <div className="flex flex-col gap-y-2">
                <label
                  htmlFor="nis"
                  className="text-base font-normal text-slate-500"
                >
                  Password
                </label>
                <div className="relative flex flex-col py-2 gap-y-2">
                  <input
                    type={show ? "text" : "password"}
                    onChange={(e) => setPassword(e.target.value)}
                    className="border border-blue-500 rounded-md shadow-md outline-none py-1.5 px-4 hover:ring hover:ring-blue-300"
                  />
                  <div
                    onClick={showPassword}
                    className="absolute px-2 bg-white outline-none cursor-pointer right-2 bottom-4"
                  >
                    {show ? (
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth={1.5}
                        stroke="currentColor"
                        className="w-6 h-6 text-cyan-500"
                      >
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88"
                        />
                      </svg>
                    ) : (
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth={1.5}
                        stroke="currentColor"
                        className="w-6 h-6 text-cyan-500"
                      >
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                        />
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                        />
                      </svg>
                    )}
                  </div>
                </div>
                {message.password ? (
                  <p className="text-red-500 text-xs">{message.password}</p>
                ) : (
                  ""
                )}
              </div>
              <button
                type="submit"
                className="p-2 text-base font-bold text-white transition duration-200 rounded-full shadow-md outline-none bg-cyan-500 hover:ring hover:ring-cyan-300 hover:bg-white hover:text-cyan-500"
              >
                {loading ? (
                  <div className="flex flex-row items-center justify-center gap-x-2">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      strokeWidth={1.5}
                      stroke="currentColor"
                      className="w-5 h-5 animate-spin"
                    >
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"
                      />
                    </svg>
                    Loading...
                  </div>
                ) : (
                  "Login"
                )}
              </button>
            </form>
          </div>
        </div>
      </div>
    </>
  );
}

export default Login;
