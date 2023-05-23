#include <stdio.h>
#include <curl/curl.h>
#include <stdlib.h>
#include <string.h>
#include <gtk/gtk.h>

#include "parseJSON.h"
#include "runAPI.h"
#include "spoonacularWindow.h"
#include "customWindow.h"



int main(int argc, char *argv[])
{
    GtkWidget *fenetre;
    GtkWidget *box;
    GtkWidget *api, *bouton2, *button3, *bouton4;

    gtk_init(&argc, &argv);

    fenetre = gtk_window_new(GTK_WINDOW_TOPLEVEL);
    gtk_window_set_title(GTK_WINDOW(fenetre), "Requeteur d'API");
    gtk_window_set_default_size(GTK_WINDOW(fenetre), 500, 500);
    gtk_container_set_border_width(GTK_CONTAINER(fenetre), 10);

    box = gtk_box_new(GTK_ORIENTATION_VERTICAL, 5);
    gtk_container_add(GTK_CONTAINER(fenetre), box);

    api = gtk_button_new_with_label("Spoonacular");
    g_signal_connect(api, "clicked", G_CALLBACK(startSpoonacular), "Spoonacular");
    gtk_box_pack_start(GTK_BOX(box), api, FALSE, FALSE, 0);

    bouton4 = gtk_button_new_with_label("Custom");
    g_signal_connect(bouton4, "clicked", G_CALLBACK(startCustomWindow), "Custom");
    gtk_box_pack_start(GTK_BOX(box), bouton4, FALSE, FALSE, 0);

    g_signal_connect(fenetre, "destroy", G_CALLBACK(gtk_main_quit), NULL);

    gtk_widget_set_halign(box, GTK_ALIGN_CENTER);
    gtk_widget_set_valign(box, GTK_ALIGN_CENTER);

    gtk_widget_show_all(fenetre);

    gtk_main();

    return 0;
}