# Avaliação ZPT Digital

Obrigado por dedicar seu tempo à avaliação da ZPT Digital!

O intuito deste teste é termos uma amostra do seu trabalho nos mais diferentes níveis. Faça-o como se você já tivesse sido contratado pela ZPT Digital e estas fossem suas primeiras tarefas nos nossos repositórios. Use esta avaliação para mostrar o melhor de si!

Fique à vontade para implementar melhorias quaisquer no código-fonte e no banco de dados, mesmo que não sejam solicitadas em nenhuma questão.

## Questões
Faça as questões em ordem.

Algumas delas podem parecer enigmáticas e pouco detalhadas. Isso é intencional.

Crie uma branch para cada questão e mescle para a `master`.

Ao concluir o teste, compacte e devolva o repositório com suas alterações.

---------------------
**DDL (MySQL)**
```sql
CREATE TABLE `user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `department` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `employees` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `user_department` (
  `user` int unsigned NOT NULL,
  `department` int unsigned NOT NULL,
  PRIMARY KEY (`user`,`department`),
  CONSTRAINT `FK_department` FOREIGN KEY (`department`) REFERENCES `department` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_user` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB;
```
---------------------

1) Desenhe o MER.

2) O método em [/src/User.php#L7-L15](./src/User.php#L4-L11) está muito lento. Deixe-o mais rápido. Esse método é em pseudocódigo PHP, isto é, não é possível executá-lo de fato. Sua solução pode ser em pseudocódigo também.

3) Ainda referente ao método da questão anterior, melhore o nome dele.

4) Tomando por base o pseudocódigo que já existe, implemente um método que retorne o maior departamento (o que tiver mais `employees`) de cada usuário, isto é, de todos os usuários de uma vez, sem qualquer filtro.

5) O que pode ser feito para deixar a query abaixo mais rápida?

```sql
SELECT department.id FROM user
INNER JOIN user_department department ON department.user = user.id
WHERE user.username = 'zpt'
```

6) A classe `User` tem o método `setDb()` que recebe uma conexão com o banco de dados. As classes `Company` e `Department` precisam ter esse mesmo método, idêntico. Implemente.

7) [Esta função](./src/Utils.php#L4) permite atribuir uma conexão em estilo procedural. Faça a função aceitar instâncias de `Company` e `Department` também.