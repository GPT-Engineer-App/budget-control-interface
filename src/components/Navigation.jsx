import { HStack, Button } from "@chakra-ui/react";
import { Link } from "react-router-dom";

const Navigation = () => {
  return (
    <HStack spacing={4} padding={4} justifyContent="center">
      <Button as={Link} to="/" colorScheme="teal">
        Home
      </Button>
      <Button as={Link} to="/add-gasto" colorScheme="teal">
        Adicionar Gasto
      </Button>
      <Button as={Link} to="/add-economia" colorScheme="teal">
        Adicionar Economia
      </Button>
      <Button as={Link} to="/add-investimento" colorScheme="teal">
        Adicionar Investimento
      </Button>
    </HStack>
  );
};

export default Navigation;
