import { Container, Text, VStack, Button, Input } from "@chakra-ui/react";

const AddInvestimento = () => {
  return (
    <Container centerContent maxW="container.md" height="100vh" display="flex" flexDirection="column" justifyContent="center" alignItems="center">
      <VStack spacing={4}>
        <Text fontSize="2xl">Adicionar Investimento</Text>
        <Input placeholder="Nome do Investimento" />
        <Input placeholder="Valor Atual" type="number" />
        <Input placeholder="Data" type="date" />
        <Button colorScheme="teal">Adicionar</Button>
      </VStack>
    </Container>
  );
};

export default AddInvestimento;
