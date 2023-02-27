import Cookies from "js-cookie";
import React from "react";
import {
  BrowserRouter as Router,
  Route,
  Routes,
  Navigate,
} from "react-router-dom";
import Login from "./pages/auth/Login";
import Home from "./pages/Home";
import Mapel from "./pages/mapel/Mapel";
import Profile from "./pages/profile/Profile";

export default function App() {
  return (
    <Router>
      <Routes>
        <Route
          path="/login"
          element={
            <UnAthenticated>
              <Login />
            </UnAthenticated>
          }
        />
        <Route
          path="/"
          element={
            <PrivateRoute>
              <Home />
            </PrivateRoute>
          }
        />

        <Route
          path="/profile"
          element={
            <PrivateRoute>
              <Profile />
            </PrivateRoute>
          }
        />

        <Route
          path="/mapel"
          element={
            <PrivateRoute>
              <Mapel />
            </PrivateRoute>
          }
        />
      </Routes>
    </Router>
  );
}

function PrivateRoute({ children }) {
  const isAuthenticated = Cookies.get("authentication");
  if (isAuthenticated) {
    return children;
  }
  return <Navigate to="/login" replace={true} />;
}

function UnAthenticated({ children }) {
  const isAuthenticated = Cookies.get("authentication");
  if (!isAuthenticated) {
    return children;
  }
  return <Navigate to="/" replace={true} />;
}
