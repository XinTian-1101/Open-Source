import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Home from "./Home";
import AboutMyCat from "./AboutMyCat";

function App() {
  return (

    <Router>

      <Routes>
        <Route path='/' element={<Home/>}></Route>
        <Route path='/aboutMyCat' element={<AboutMyCat/>}></Route>
      </Routes>
    
    </Router>
   
  );
}

export default App;

