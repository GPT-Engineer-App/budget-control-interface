import { Route, BrowserRouter as Router, Routes } from "react-router-dom";
import Index from "./pages/Index.jsx";
import AddGasto from "./pages/AddGasto.jsx";
import AddEconomia from "./pages/AddEconomia.jsx";
import AddInvestimento from "./pages/AddInvestimento.jsx";
import Navigation from "./components/Navigation.jsx";

function App() {
  return (
    <Router>
      <Navigation />
      <Routes>
        <Route exact path="/" element={<Index />} />
        <Route path="/add-gasto" element={<AddGasto />} />
        <Route path="/add-economia" element={<AddEconomia />} />
        <Route path="/add-investimento" element={<AddInvestimento />} />
      </Routes>
    </Router>
  );
}

export default App;
