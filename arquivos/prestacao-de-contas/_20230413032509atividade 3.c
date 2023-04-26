


//Controlador de Tráfego  Aéreo: HENRIQUE matrícula: 2211100005.




#include <stdio.h>
#include <stdlib.h>

typedef int Item;

typedef struct elemFila
{
    Item item;
    struct elemFila *proximo;
} ElemFila;

typedef struct
{
    ElemFila *primeiro;
    ElemFila *ultimo;
} Fila;

void inicializaFila(Fila *fila)
{
    fila->primeiro = NULL;
    fila->ultimo = NULL;
}

void insereFila(Fila *fila, Item item)
{
    ElemFila *aux;

    aux = malloc(sizeof(ElemFila));
    aux->item = item;
    aux->proximo = NULL;

    if (fila->primeiro == NULL)
    {
        fila->primeiro = aux;
        fila->ultimo = aux;
    }
    else
    {
        fila->ultimo->proximo = aux;
        fila->ultimo = aux;
    }
}

void removeFila(Fila *fila, Item *item)
{
    ElemFila *aux;

    *item = fila->primeiro->item; 
    aux = fila->primeiro;
    if (fila->primeiro == fila->ultimo)
    {
        fila->primeiro = NULL;
        fila->ultimo = NULL;
    }
    else
    {
        fila->primeiro = fila->primeiro->proximo;
    }

    free(aux);
}

int filaVazia(Fila *fila)
{
    return (fila->primeiro == NULL);
}

void liberaFila(Fila *fila)
{
    ElemFila *aux;

    while (fila->primeiro != NULL)
    {
        aux = fila->primeiro;
        fila->primeiro = fila->primeiro->proximo;

        free(aux);
    }
    fila->ultimo = NULL;
}

int qtdItensFila(Fila *f)
{
    ElemFila *aux;
    
    aux = f->primeiro;
    int c = 0;
    while (aux != NULL)
    {
        aux = aux->proximo;
        c += 1;
    };
    return c;
}

int filaOrdemCrescente(Fila *f)
{
    ElemFila *aux;
    aux = f->primeiro;
    int valor = 0;

    while (aux->proximo!=NULL)
    {
        valor = aux->item;
        aux = aux->proximo;
        if (valor > aux->item)
        {
            return 0;
        }
    };
    return 1;
}

void listarAvioes(Fila *fila){
    ElemFila *aux;
    printf("Listagem aviões:\n\n");
    for(aux=fila->primeiro;aux!=NULL;aux=aux->proximo){
        printf("Avião %d.\n",aux->item);
    }
    printf("\n");
}


void infoPrimeiroFila(Fila *fila){
    printf("O avião da Azul: Boris 111, id: %d, está prestes a decolar.", fila->primeiro->item);
}


int main()
{
    Fila fila;
    Item item;

    inicializaFila(&fila);

    for (int i = 0; i < 10; i++)
    {
        item = i;

        //printf("Inserindo na fila o item %d.\n", item);
        insereFila(&fila, item);
    }
    int total = qtdItensFila(&fila);
    
    printf("Quantidade de aviões na fila: %d.\n\n",total);
    
    removeFila(&fila, &item);
    
    printf("Avião %d saindo da pista.\n\n",item);
    
    printf("Avião %d autorizado à pista de decolagem.\n\n",item+1);
    
    listarAvioes(&fila);
    
    infoPrimeiroFila(&fila);
    

    return 0;
}