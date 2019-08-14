<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('persos')->delete();
        DB::table('persos')->insert(array(
            0 => array(
                'id' => '1',
                'name' => 'Dirk Hedtke',
                'adress' => 'Kroosweg 17<br>21073 Hamburg',
                'tele' => '+49 0151 75032189',
                'geb' => '13.4. 1972',
                'family' => 'ledig',
                'state' => 'deutsch',
                'driver' => 'AM/A1/A/B/C1/BE/C1E/CE/L',
                'lang' => 'Deutsch (Muttersprache)<br>Englisch (konversationssicher)<br>Französisch (mittlere Kenntnisse)',
                'rel' => 'Buddhist',
                'email' => 'info@pixelmorph.de',
                'pgp' => '-----BEGIN PGP PUBLIC KEY BLOCK-----

                mQGiBEN7hnIRBADg4d3SfJh+ZijgfY5Umt7BB9wtRifhfjWq07gPL3eqTXFkfIMX
                hhsAzhf+nP4dVzvHGdSDgUiLSSLx6RtNjBEYLw9D1MX4/VlMtlR+2cGUfI5QPjQu
                1kZcE9gg7kr4VsKnshETczIIYGnxXfA1dBYImGhLJLMKADP0NBBW91qrwwCg/2fJ
                fcZCB/TG+LpQJX6F/aiWbQcD/is3OIQsghaG9lt9tVk8Y3DLZM3Rrq2Wl42vETWh
                etJFD44EpzPVTNiJoDJHxWX+92gmzkZpZQv+Q73/jqHZOExUQAE2jKnS1jQ872L+
                NnClfOv+yNdn92ERr/q3Swexk/FriluS+PvxVL0f/Hjty/w5GpUDbHZa6L+5bHo9
                oYZsBACnF8dNfaH2EGTvgC7T4N9dkJ3Xekt+wHbHQHIcEYzhtI67qruCLDYLslTz
                7PsHW2iwZczHZS31XSBWN0qS35uhZwlEhYtL8XBjDhbOYsiA25eh96w1O89dNuW+
                3T64F+5P1CS7qLpB7dKvdE1Vd2aBGP04FVkHc5WTIgqkySwCQLQgRGlyayBIZWR0
                a2UgPGluZm9AcGl4ZWxtb3JwaC5kZT6ITgQQEQIADgUCQ3uGcgQLAwIBAhkBAAoJ
                EGg7IR8JxJiVCngAoN1dPoXnb2BDTScLh5IFwE/AskjXAKDDeNHWOx/EL7b7VIBW
                liLUUjhdhokCMwQQAQgAHRYhBPSiOPtcTFSGGRK+p8pW9UtkKN4UBQJaQA4QAAoJ
                EMpW9UtkKN4Ucl0P/2kuApgqNWps1l0UDXVJrUZdLEgcYkFWwAIgFIqfh3dA1fMO
                ofTOcym09YBYQMECbxIQZ+RhTxIWN3/FRD4SL/K629bWLayj1Ff+VjsN8ppGS97+
                8APaMN7me4hPfW37WG/coOxp5eypNF9gbS6bg+ooLEHJeXlntxgFTuuWR6sHz0JK
                pFVKNT0pDbkC+IUfV4WFvoX3vhQMNtdJ1Y+usQz+VeI87BVxPlPInMNbe9rJvNAR
                sPRN4/1n4R/0ZwW8pKNZkfZF7ih79IyiyAtVoMqnYnxf2TZG4/u+vzKXSxQ/J30Y
                1y4ojFM7k8V+22UUw5W9Ap/raf6CdfnZoDcIOjXCW9GXXhiLO4TRpu9g09/4wkSG
                sL4zzPblbEPnL/08KYV5Gn/2dzNnd1uEIvMH+HGvf3kUiWj+HhJ4tZfBAv5yAQlh
                IzY0XanLSbYT8K/2gazXLbBFqh5DJHF5YoLIs9+JNDgFOb/de4Yi+Q073wiTTp9i
                R8w7V/Gq+kA6KgC/bFvU1ztMAuHRsdKla9YmFDMNcOph6XmpvX6mcK/Q4joyP8jx
                kPD8htvrDc/ilBWEtLrEEeckxz4GV2LC9pc8GEeSZ7Y5aZEfMWujK7R0S5eGyKvQ
                hJs3xbWCQdRlPpFWkuL2DChM36bmVBt6Fk7fWPcLzy+X+r/jaa2H8xdiuOQsuQIN
                BEN7hnIQCAD2Qle3CH8IF3KiutapQvMF6PlTETlPtvFuuUs4INoBp1ajFOmPQFXz
                0AfGy0OplK33TGSGSfgMg71l6RfUodNQ+PVZX9x2Uk89PY3bzpnhV5JZzf24rnRP
                xfx2vIPFRzBhznzJZv8V+bv9kV7HAarTW56NoKVyOtQa8L9GAFgr5fSI/VhOSdvN
                ILSd5JEHNmszbDgNRR0PfIizHHxbLY7288kjwEPwpVsYjY67VYy4XTjTNP18F1dD
                ox0YbN4zISy1Kv884bEpQBgRjXyEpwpy1obEAxnIByl6ypUM2Zafq9AKUJsCRtMI
                PWakXUGfnHy9iUsiGSa6q6Jew1XpMgs7AAICCACteS2WxiAd4tqb7YXj+WhsPD+4
                vHGh17qC8BLRjxrGJ5osSKqnH6pLyc7+QQHTpTK72Wb/i8z1L83HlfKVNSPt8DQi
                oTubMIBZB90evJbc/81G9ZIKulK8vSkHvD/CNy61SXhdsfHXCSzPd7/eoeYlb1Bj
                84XMDlahJ2m4SiyX+u38x5LPeGw8fgl2wt3Aj0M38d9HP4gz68Ivsx9p1Y3S4N3V
                nFcgc17SX0KMek65k/fSPfLbJXm880h+NTdqgm2ViMeKN7LtuR/s6Z8+ZcD6aoVW
                dEN+wLDsIezXboBqaNOL7GgiHMWNBNuprN9LFEqi1bKaLTNIgCNzCCGAalJEiEYE
                GBECAAYFAkN7hnIACgkQaDshHwnEmJVR5ACg3Hle3FKDTMG9uE/qsXDoeuzIZEQA
                oMcvm++tFZ516AaUm5KXIDwAeX2N
                =ztiO
                -----END PGP PUBLIC KEY BLOCK-----'
            )
        ));
    }
}
