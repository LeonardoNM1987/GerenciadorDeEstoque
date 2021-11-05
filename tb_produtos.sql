CREATE TABLE tb_produtos(
	id_prod SERIAL PRIMARY KEY NOT NULL,
    codigo_prod VARCHAR(50) NOT NULL,
    fornecedor_prod VARCHAR(100) NOT NULL, 
    nome_prod VARCHAR(50) NOT NULL,
    descricao_prod VARCHAR(150), 
    qtde_prod INT NOT NULL, 
    custo_prod FLOAT NOT NULL, 
    valor_prod FLOAT NOT NULL,
    data_aquisicao_prod timestamp NOT NULL
);