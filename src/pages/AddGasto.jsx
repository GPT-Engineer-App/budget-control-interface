import { Container, Text, VStack, Button, Input } from "@chakra-ui/react";

const AddGasto = () => {
  return (
    <Container centerContent maxW="container.md" height="100vh" display="flex" flexDirection="column" justifyContent="center" alignItems="center">
      <VStack spacing={4}>
        <Text fontSize="2xl">Adicionar Gasto</Text>
        <Input placeholder="Descrição" />
        <Input placeholder="Valor" type="number" />
        <Input placeholder="Data" type="date" />
        <Button colorScheme="teal">Adicionar</Button>
      </VStack>
    </Container>
  );
};

export default AddGasto;
