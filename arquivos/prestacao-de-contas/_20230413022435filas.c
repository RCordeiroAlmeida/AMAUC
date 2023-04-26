#include <stdio.h>
#include <stdlib.h>
typedef int Item;

typedef struct elemFila
{
    Item item;
    struct elemFila *next;
}filaElement;

typedef struct
{
    filaElement *first;
    filaElement *last;
} Fila;

void construct_fila(Fila *fila)
{
    fila -> first = NULL;
    fila -> last = NULL;
}

void insert_fila(Fila *fila, Item item)
{
    filaElement *aux;
    aux = malloc(sizeof(filaElement));
    aux-> item = item;
    aux-> next = NULL;

    if (fila -> first == NULL)
    {
        fila->first = aux;
        fila->last = aux;
    }
    else
    {
        fila -> last -> next = aux;
        fila -> last = aux;
    }

void delete_fila(Fila *fila, Item *item)
{
    filaElement *aux;

    *item = fila->first->item;
    aux = fila -> first;
    if (fila-> first == fila->last)
    {
        fila-> first = NULL;
        fila-> last = NULL;
    }
    else
    {
        fila->first = fila->first->next;
    }

    free(aux);
}

int empty_fila(Fila *fila)
{
    return (fila -> first == NULL);   
}

void free_fila(Fila *fila)
{
    filaElement *aux;

    while(fila->first == NULL)
    {
        aux = fila -> first;
        fila->first = fila->first->next;
        free(aux);
    }
    
    fila->last = NULL;
}

int tam_fila(Fila *f)
{
    filaElement *aux;

    aux = f -> first;
    int t = 0;
    while (aux != NULL)
    {
        aux = aux->next;
        t+=1;
    };
    return t;
}

int asc_fila(Fila *f)
{
    filaElement *aux;
    aux = f-> first;
    int val=0;

    while (aux-> next != NULL)
    {
        val = aux ->item;
        aux = aux ->next;
        if (val > aux->item)
        {
            return 0;
        }
    };
    return 1;
}

void list_planes(Fila *fila){
    filaElement *aux;
    printf("Airplanes list:\n\n");
    for(aux=fila->first; aux!=NULL; aux=aux->next){
        printf("Airplane %d.\n",aux->item);
    }
    printf("\n");
}


void firstOfList(Fila *fila){
    printf("Airplane %d is ready to fly", fila->first->item);
}


int main(){
    Fila fila;
    Item item;

    construct_fila(&fila);

    for (int i = 0; i < 10; i++)
    {
        item = i;
        insert_fila(&fila, item);
    }
    int total = tam_fila(&fila);
    
    printf("Number of airplanes at queue: %d.\n\n",total);
    
    delete_fila(&fila, &item);
    
    printf("Airplane %d going out.\n\n",item);
    
    printf("Airplane %d autorized to launch.\n\n",item+1);
    
    list_planes(&fila);
    
    firstOfList(&fila);
    return 0;
}