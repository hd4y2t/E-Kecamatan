<?php

$pdf = new FPDF("P", "cm", "legal");
$dataURI = "data:image/gif;base64,R0lGODlhlgC+APf/AI674qTJ6MbFxP/NJuPMo9nZ2f/VKf/+8veJMOnz+v/xA/7+/f/7xejWul2LoNi7iOW5SQBducbd8VmY07a2tde1eP/xCt7ClBp1xCV8x//75P/yFDWFy920WNuzZqinpuHHmvPz8//1R//baf/zJwhrwFhXVv/0OQFqv+vbwv/964eHiJeWlvT5/HSr2//NKXl3d//3dpjC5ZHatfJVNWmj2PVxMu0pOdOubdGqZuvr67TS7CgmJv/5l+Hg4Nzq9um6PP/2Zf/4hP/6qKelhP/7uf/++GdlZf/1Vf/QOxOrYmnJm9Lk8//OM+41OABlvUOMzhxLcPHm0v/XVv/vu+7i00hHR9/Gof/ih/7ppwCoWje4eYS24LXnz/j4+Pn07QBfuq6QXf/mlO7gyPPCMuLu+P/SRfy2LPLq3fr9/h+ck//93czg8vD2+/Xt4cfr2d+ubv/yHQGlU//JHv3BK+bQq9Pw4v/33rnV7f/00Hyw3f/80QBivNGscU6T0f7KJ8itewtqv924cvLjy6XgwxJuwfqiLvn38wRmvs+pbglRi3Gt4r6+vY23fF+d1dOpV/Hw7y6ByQCrVJKqsf/NLczLy+6/NQGiTg5vwfny5m9tbOzWONvVw/bw5b/Y7tXj5/bFLuH07PHDPSU7S/Po1t3u/vz6+frJKWmrZE9NTQFztuu/RgCnWP/ON+C0S0qQzwyUWVJdZZaSkAhnvvzLLF9dXbPV9AunWvf7/UN/pvnHLQKads2kXABav+PQsgmmVzyJzf7fetiuZ/Dl1wdgpQekVI+OjlRSUQFgsRhvue/69dmtT+bm5tjo9Tw6O/XGNvDXnYB/f/DAMqCfn3NycarS8+zWMPjIMtXm9O3aYwurVwKGkfBAN7CvrwNkvDqXa9LR0fr/+vnu2Yagr6e4vb+0q63O6keOz1KW0TJhg26kzNCoYv/vBB2waJWdhX2cpF1tfAF+nGVzfhp5zmNwgbvO3ERVYdDn+tjr/KPL7qnS4OzZTv/MKu4zOP///////yH5BAEAAP8ALAAAAACWAL4AAAj/AP8JHEiwoMGDCBMqXHjwEAEQbhhKnEixosWLGDP+O3QhB44KETWKHEmypEmBDXI06PQAxMmXMGPGBFHhi786FUzJ3Mlz4IKeCQngyHSzwiGgB38ivUiFClJTUsZ0+velzoMcBMZUyAFC5yE0nZT2zJNlaUUxTfL8W2DE5JcGOgV2uoCjbooGdXHk8FjXzaAHdUF8GXioTiaTRtpqMBNMrNmEWfglUfEvC5Z/Rqi0zWiqJWHAeT/WrVCnAV0cFyqEvnB07YUHrTNSoWz534Ep/MQ8VqjCDL+0B5KM+EclyZ1/KtRaHIMDxM9DIOq2XB27TugHqnHU8Uo3xcU8xw+Y/9GNhd8dFUl+H999kAolfvyw5JGsQswf3WKmHLCIFzXNPjg8oFMKAOIgBUFfZNfAP8yNBgJovlw0QjCVUTKCEbhRkcUA8JXFnkGRwUdJMK3wE4wY/FCSxQi5WUQKgH30QQABD1yg1BUxhiTQAhf0YSNVFTxgFYx9kGIRFfyYUVx85b1AInz3fWgQFU3AZyV8SbxHSRMvUCLGARqEqcEdZJZpJnjQeOABNGPmAU0WeZAlzJpxxkmFIHSSBQ14eeC55h3gmSmomBqoQOUAW3aZpZUvWOmhlAOJd+WkV1JCSRKYYtrEppx2umkStPzGaSu0bPreC020smkrrTS6JSWldv8aqqe0fpppepTmKtl6kA6UxXu6BivssJRuySmwxCar7KSX9UqQESzCZ8C01FZr7bXYZpttEgZwq+234IYLpX7OEpRHlfwYYIgN7CJgAwLuwivvvPTWay+978qbb7739uuvvvC2a4MhLzTKj1PlCsRiwbpwc8PDEEcsMcT93FDxxRZnPPHGHHOM8ccad7xxP2cYAB+55bpHyQsG2GBxPzDHLPPMNNds880456zzzTfQYIDBj0K6AG7pGvLyzkgnrfTSO9+AgMlJauBsZJQY0PANTjCt9dZc54x1yY02K+UdvqXrctZdp6321k70XPBvyn1YXroIHL323Xg3/TR8Izj/ZlYe7xlwBjd5F264zRYbYvILQS912x8F02D34ZTn3TY3uphsBq9Lociyy5WHfvgNNvxsoT9/B26I6Kwb7jTUje+kAm6Ct936zE7krvvuvKN9O8yJG3Ap5zthwfILklfue8wiNz85zMvjfTkdJvfdE5JmP3/3yE5www0N4NPA7vjksxu+92hPfHjbPjeq2055pGdA3Vz7LnE/3YPfriGGnHEGHX/gB8vCNS1+/EEX/uNfwMDHjaxFTGbRUxrpTIcwmGCIZavDH9Mklj8awKt/ALzWAAwwgBIOYA4nnAMKTZhCFa5whNjiBx3OwD/zEe5+WnsdJcwgNZiUxwB0cJgE/yH2PXaBMF3VKtgfXOhCRGHKDFOI4hTMkARWJcEMUIwiFZPQhCUycQ5/GMAAqfWCGRrCXTRw4MOYVjJ+XOglYlCi5CIIPeY9zHvv6t8frDUAL6rwD01IQhSDgQUxUAE8YVLBARa5yDDdQQOLNAIjVdAmKogBC8EYwRSrxMQSjtFkujijDdJYsTXmjmfcaKPYMqKBuFCpaqCjmRrvKL7+IXFaLyihC/8gyBGIIQtUOI8RFuCPYhrzmMhMpjKPyRYV3EFDYgjGFNLDRMhVS4brosEN11gz9rHsDx4yQg8rQoUL3SEJn9MeEWtJPTIa0IWSGQEW4ARJYi7znvjM5zKNkP8cy4zADJTYpQDHGEoEaJNiNJsgqpxyIoqwhTgvwALtEBCz9FmMGwMrGbXe48U/tGIK88yDCuypz5Ka9KTFXMAB8kAFiSaho2KsFh2yWco6Vqx0LxiPl9bitylpMhhlw6DtaurBM9xSiS4UJBaCaQSUOvWpTl2AocQwgpf+UVoFPINB22a3pxmMMVMYQRb8phQqUUpwDnuYE4p6PCi5sAkgpYIGSArVutq1pPy05DQFOkY6uKuUwXtbijokEH8soCkCQdGkgOiwtSJAoz/7gxf5MYVgBJOud82sZvWpgZZOoQlXvSUN02ixNlaKQv9g6QiG849gBJBRdNDmYweYSxX/DkA4cDrAZnfLW5MagSzBsCoYx6hV751BsCfbDxY06cZoXekF/Nvjz1JIibjOtbfYzW4+VapX0M6hUdQ6I3INOKHqGi9YLIPSAFoRjCzcoanaja9872mEZ44AFIzCJaVyaaLFDEs4weiAjeabCVLoEyz6/IKB8WkEKdhEvmMQxgVWVLZgtUIteQBopczgS7n+gxSJuMBdMatMX+Qkny3RZwqMgs8v4CAFCU4BiUs6BqysZapARZeVlDQQFWQhk/KcDeoGIoUciLiuXyDAg+8Jghx0Ap+HCNKMj1mHdbgBn2hYRx1UvI4nP7XGBDDISpc7oSyMkyA9JbKR7SoFXkgB/5+decQY8NkJYdQEnzySMz5T8IgLwPeedeDFIKAKZoWkWSJFPjJUG8CLBrTYA67wBT6r4IoOVAHKgog0PgngCkEsWZlGuMAytnzPQ3zamIWOSaKVmeRD5BMErhjwMofRAWlcwBT3bAAQIODoe6KhA5ZQdDJ5JI0OLHiZXxBEsHG9zAY84M+otrGq15xMKazj2MrsjDQE4epmQ+AUnr7nFaQR7Cn7IwWu0EUFvLDMQwjiFLyedAdOcedl0uXU/kg1TFadTEbD+J5u8MApOjCMexIACAMg+DI7Awp1d1uZBx+AB66sTDR4YACWuAI+GwCBhBdcmVF+BLaLqe+X8BuZIP9YBgH27IoBxFuZC3gAGQbgil4nsxMeoIXE0bDwC8zcFXNWJroHAAoB3fMC0qC5zZHphg7UPJklP8nJjdkZSzxAt8v0RceDjewK6ALjGldmFTpQQlf8O5kJ+joEJF1ihJ/CA15OZpSvAfZlojvjUJf2vql9TJy/Pe7INAXSic7iZP66hNdYtzI5XkIgrFyZtC5huYd9AUuUsANBTyYpPJBLUCg+mQcvOrOjHeZpC7uYlE545pGZbFBwqAM8T+bQX0ALD8QemVew/ADIYPR+t/wFnn+4MaOsi1wCge2+F+MfJp5Mhi8f8PnWu8n5bkxfIHzts+5Ao5Tedg7R/OxUl7n/GHXhAXz7I+K0Zz4yLR4qjMsa9wjnB81XX0y/J/zSx4y6SaZu2MoPwNYz1gAtJ394h0w8Ynny53jJlAkCt32W1nziJ39AJ3sDOADqhm+H8ACul4CPl39kNwDHh0z6VxL8R3wWWHi4h4DAx2ILQAquZoLyx3ujh3pkBx8ux3aZMAjEBAkNKH/Y5w+D0GvWxyECpHD+0Alv5g8Bdwo2yHvERFJD6H5PaBMjSBKr9gUPZnFitHPFRApBx3BEuHxXlgl94GgWdwoG83f+8BauJoBE6H7FVAc5QBS09lpw6A9X4Wr+Z4MvBwJ9YBPoZjDpBwnnZmAxN3Mn6GpfwBqDIH1S/2dkMXdks/d9xQQYNuF3BkOJDdBn+TaANoh5/sBoBnYF8Sd/6mYKceZojGeDnmcKv7YMY2AKFQAKjWJ8GodzywBjQ2gl97cAFSBiCYKG8md7oShojVh6ewcCpCAMwnBlEZeAGkcKHZCL/jB2RAiN/lB5HdAJ1mcwCShpDzBqeDhz8FEwtieN0vAAC5B7RPgCz3dw0gARHvBa8teKWmdrnUGOfNgAVbAMBBd522d2hwBpIHCMMlFkV3BwQFAHh+h9TkiKXLeLNvgMD2Bxf7B27MiLlgACtMZ7kPBu3vh9dYBwHjAMPneNCdcAXvcHguALNWglLDkMs1h7VQCSGnkBlf8XbHXQcTZ4fL7gCnPQkjiAjCb3EV6nbmggCMUnQLQgCFVQAaewfGgAAghYjk15AR2XeLPojS+gbg+wChLXABd3JQOwCqlBd6vwADZpg6sACBCQSxAACGBJlh3wAB8IAQ9wcVx5DX0gDObYB6Lwhs+gGnQHAapBlFKHA33QcS8Qay9ZhBXQcS53BV7njfLXAYnwDGLUAcKALDboAYlACwYQlzzJKM/QBx/Il48pQKLQB5r5Aq0ZmIzyAquQmWL0DIlQmozSAWA5AKLgAdfgjbQgDJL5DHWBmPtXF8+QS7gJASvDh66JeH3AeZNSltonf6LwltW5CquQS63ZnZNSe7L/mXDgySi0IArIIgqh8lzXsApXsgrLmSuWaZn8cA204IAycpA44AG7KZvleA2iYDC0wJ30uV8FOlDwMaDBSSnriaC5co3ypysQKkbL8ly8uAr5qWqoSZb0yV+8CKEWWqEUWqEkWqLJUpYZum8bKogm2qIu+qIwKkAoipwkOJ0sdKM4mqM6uqM82qM++qNACqStSaNWiAPC0AFImqRKuqRM2qRO+qRQGqVSOqVU6qQeMJQHmQMPUAVc2qVe+qVgGqZiOqZkWqZmeqZoGqbDIIdEOhL8N19wGqekl6WnJ6d2CmGOuH/Ud6d8ml1V6KZrdgDm1qeE+mV5SoJrFgRBsAbK/xRJiZEYmCVJj/qoKXUAkFpMj0pSlGpMbJEYx7SphrWpnYp1nfqoi5RMkypJlrpMB9AD2ZAIbSoSq4YEChAHMcCox1QESHACItCrIoAEDPCpQsCrvioCQmBYMcCrMVBMDNCrQdBUC5CsSLAHxrQGSPCruGqtIhAExXQAQdCr1OqtInACPeAPKvCtxSoCwWpMBxADxcqrPYB1x3QAQ3ACCmANKTp9IkarG2ABJHCrx7QHQWABCmABBLsBQiCvKhAD7GCwDnuse0ACBVuuRkCrCjAExSQECqAA5VpMKiCxcaABxTQEG3us/tADG8ut/hADGysClhoEBWuwCkACGGtMDP9wAg67sScwBPLqsfVqsBuwCfn6iH4mAhawAUg7s0KAq8yKBEC7AQpwAtRqTENAAkeLtBZQrnsQB0cbrFsbtbr1tSrrD0YgAlELXxq7AdSqAvZKAirgD0NAsCfwtiyLtFCLBEzbrv2atDTbs+baA/Z6tUE7tHpatILbr0orssZUBDh7tAqwAT3wZ3tgr1i7AUXgD0UAtXN7shNrWGbrssbEskiAqbQqAk2FshaAsWsgsSTAqGnbrxYQA392s48LtXEgBG97TCoAuAVrt0grtLGqEYl2AJTru4hLAktrTEbAu44rAlNrrjDru8HaAwS7rAdgtpuLsmprTD3ADiq7BnH/oADH+rEKMLoVW6vTe7UWEAc16w8HIAR7a7BB8Lwe2wNWe7hJi6/BmxGJtgC6yrX4S7DIy7QqIAQSa7uRm1I9EL9xQK0ae7H+wABQq7VxYLnVOgRTq60OPLMbvAEYG7dYK7U2S7kGiwSXq7sG3LvG+7giEAywSqfV2gMiALWHK8DJW0xrEAM0bAF4u7gH7K8iC7MNvLK1KrJFsAbQhqrFFANxUK5FQLBOzLVQGwS5+76wG7VDAG0aYMBPa7cFewIxwAAL8KeyamSemlIMMKwEe7hKy7R74LQEy772pAFm268ioALn67IqsK1Me1IaYASrqwDLGrEO27ERbLQ2nLs4/5zCxhvHQTAEikzGwssV1ioEDPBnB1AEMXC/dmvDTFsERluwPUy2QtC8UmWvx7qqBtgCytDKrTxj7cqtq2uwJLCuVty7AFutTKzCsBsHSNADiuuz2UC4iAoC4MvClvxnKjAESBC+6lurN0yv9jqz7TsE4asA3Cqw63pMoUAIS7AEW9AO4SzOW7AEM/AGysBM/qAB04wEitusG8vD9JvD4dvJyEy/yxwEEqu/WQoCH4u1j3sCQlAE8roGMkzDfHvDBSyxFkDFxTS5JZtMuPAGS9AOv3AJGC0HcsAKxSAHxVAMl3AL7bAEXZAGxqQCtCq7pHzNOxuwu+zFFgDGl3zSQ/+gzw47uPuLEcOLs767xmBM0Ji6B2r8uHF8wzkMtSRwwud6AtvsD8pACFtwC8XACqygBVZ91Vht1XIQ0lvQBewqxoe8sSSQwA8dBFCLtf4aBEWgyPlstbVrt8BLp8T71j39xTHAs5iqyW5d1LgqsBsbA297AIrsD12wBRhd1Vmd2FnN0bewBOFwTPALzcEssM4cx7/M1jW918bbr3Ftete7sbxc1xtAAo+cu8vczKA9wMUEylE72KGwBL8gB4o924r9C8WwBXZgTKU8rTZr1gV7zzRt03Rtzxvb2XsnYmtQBD3wrSQAu/hLw6Q9BIpr0DO8sbfLqMtryITdDpeA2LT//d1YfQnt4NVkuwdPyAADG89gvAfw1dYb28g3fQJIcNdZ8MKmh0yAzAA94K7NTbAq7N8kgATS/dDDat0xEMz+gAszINXg3eBZLQe3QAi56rRirdZY19ZrjNYFGwfyLQQYHMmHaoWQqEigpgIMMAQxsKuI67CW3QPYXQRBUMEn7NRLcAmy7eA4rtW/MAO6/bgCbtqZvcYyu74djsGCqkySzL9Gdr0nEAQezgCQpEwqsAdDIARBcAIADNpxIAIu7g9r8LyhYNjeneM4zgqXwOPui8E+q8+gfbQc7uRFsAd+675rcOJWLgL7YN/HPdcxO9od3gNHPOeArNzfyrXxfMfG/2QHhk3mjG7VHI3mZMvM11yrTQ7ofWxYJj4E+72rFZyz/OzZPN3TN83hIhADgL4HePypKqDcyWqy/hDml9Dosv7o3Wq0lb7WnDrlrL6r/S3km23c+kq8zw3f8Tza2/rkqY6pxgTrst7sHC3h5roGbzvomy4C/R3Pw/7rxCziF3AADL3GMcvi4u7fbb4B8h0DM44Li97szS4HvwDt/jCsbg3abT7u4v7b/v3px20E6Nqr15quvXoCAj/wJFDwBh8HCD/jNa4FVN3wDv/wEB/xEh/xEA7tDEACcWDwGj/wHA/w/u6rw5zTF7FqbLEApaqqjCTYKq9IKtDyhfLyikwIxf9wCzRf8zZ/8zif8zevBDzf8z7P87egBOQNJjBfKC2/8pGU8qlKTEmu03vaW3bwBlI/9VRf9VZ/9VZvB1q/9Vy/9W+Q29jV9CP/9IVa9nVlkNP2ALawA2zf9m7/9nAf93I/93Rf93Z/93gP97YgAMIg8hYhBR5ABIjwBIRf+IZ/+Iif+Iq/+Izf+I7/+JCP+HzgAB7g9xUB+ESAApq/+Zzf+Z7/+aAf+qI/+qRf+qb/+U9A+ZZPEZh/+q7/+rAf+7KP+qp/kIE/+7if+7qP+6kPB6s/Ea2/+8I//MTf+YhQ+6oW+JG//Mzf/M7//Ik/+b5/kHBABJGQAdif/dq//dz/3/3e//3gH/7iP/7kz/3z8A6VT6dtsP7s3/7u//7wH//yP//0X//03wL4jwv6nwb6DxC4WgxsU9DgwRYpEhH419DhQ4gRJTqUkuOCP4wZNW7k2NHjR5AhRYrE1abZDyYBmPxo1gaXyDE5GE6kWZOixZE5dYLEVaYZmwDmzAWQgK3My50by3ji4ihShkCYSjyJiilDpAl6zP1I0zHmTJthI1a8uDFNmx9szAHg4gLdBLhx0bnQIwPPjxZJ/S1ok1LPBA4YMAV6wsdwCUwYsHIx16yryDYSuKDDMMvwZTARMkfQDMYzn0LAXOxIoPGrWNQPK4JY0OIHHgA1XmUoFIjP/2bOnHvl5gzmSaFIjswleOyxJx4uE2hn9twcDJ8nhZ/ffl4Iih4JLvcu8NcigScAymc9j254lmJ0jhxNWM+BtjfPnL1lEN7G3+nUqSs+cFoIEe7eoENBKsWewkSqwnjzBoNXXAiKCQiHaiqw/+LzrYQMznGECy4C2GEHc1yI5L/LbgskAyjQ8WPFwCwj77YnMJgAAE+I4+isZsxJLoMSIthtPj0qEQas/MKSwgMibusNkUIyAMaRuszx5IcfyiCISibMkcEFP6DKjbyoAvGGOurAWPAcPVRqg7uOcGHqlcqc+6xE6cCYJRIXzLEPI74SaMNPP5HKqAUJAPADAz58dP/AAyKLrOlIIpqcSwZPmrExqTbYkMERqOT8bBbgZsSjjOL2KggbNlIto428MEqg0BqgoM0/RLwBFYMnZWCi1QR24KKGczIQdlgnJ80uowXKMKeGQhZt1NGJ9sOnVY3OYkKCAALQwwVuu3Whwx2aobY7CWT4Sz0uAAhgSkH9wSXH5GTNQKpASsDgqldqCIANQdFqBo8PpywNIzf1OAeDJ5zjbWE+MPQDAH4zSqASmaA1MgcQCC6jXD0cCQwTy8j0lA9ErHoFu3E9SqMM5CaIBJOEAVx4Oj4CwcARGX7wKAFN0ckAEcPqZDIDDiIpOjD/cAOjBA6we2mQii1+VJgHYgP/Js7ODPsMEa4LEYxr+MqM4M4aAMCDDT9NUiu2wOD77DmbOZigBj0AsNsRDMaMLmZcHfHWESgwCMSzvcFAhD5KrXwsjTQSeE2GGq5WcmxgAOAkaqmjRTLRL5+wlwN0yrbLk7scx8OTHdhCh4NCnvBRM0RsFraQqTbLjGQM0AwAmz05amMHFzgoQezenMOsYWC4kACpNH4Cyhwm2Gim3QTwcAGYHnvpxdnMaYK0ZgygKHv33nXq1YXAOe+teG8k5cKT3huPPgAZ6DeHDSbaYPyHEIMtZBa3ecZWiqmBDEiFCyZYTTD14oM3AhGV8G0IfhnBhqFKwL3uSUQKiXgA9MrX/4IyAAUA3PIDFEx4Qiicg26USgB3kgU8RwCDA8CYmwsAsJVWpYF/LgCM4Fz0qbhNQHktWEBPPOEJGdjNLmzQnw5lIJ45aU1rz4nP2BjEBTawCR+MwFwGVYMxjEQGcrP5X8IWtpvd8AZ3yZNAqToSGQA4BWYA2lp0mNOcBaHDgG5sATYCUINIDI5mJAOOH2pwyEOuDgO1y80skscEf0DtWV6UAg4AUYMWlck5iDgPBhQDDGBkwJNisp3hglOXs7FhBzL41dWARsUI1AxFdFPXET0RgAnkjTyF4YNVznEOKLwiMLaBjh3BgAE/vK98G8EFNsyhBzh5Izcl8AMFhuTFsf9sLmugmiUXKCWBBITzMd5JABNg44KDjad4nASghajDJCg4CBsp20gbPAHNvN3GMJ2ZDi/5MIsM1GA4aWiBpvRwyHMAI1816BATw8gUYBQCDNu7JjZVgySTuUAGEjiKRgTSDAmEVKQhxctjMgUAykgnQE+YhVWEWCOMNA5bB/UDKEEZuoYmYCmQk9XXuObJXO3KngarzOSaE6DziIY0GCkDAICBQYs2RFqCakEzUueWUH5tFrPgGjsTE4kGBUBn3VnlQRkqg42WISNwlOMPZRbLf+bufaUh6A9CysQ04IJn4UFY0Mi0VcC6qHh8QCYAxpqCLlp0NXBE53s81ZwpPrb/ZlCY640iEwB0xsl4TLoXMKEADEwETToLKtsORIpEPfhsPMU0TCA44IgbQki2awNWBsbDnEC8Ih+cqGhU/yEFYRDhZ3Qk2efExy11ZWtbsXoZ0HLTvhk6ogYTAEYkaKek5iAifA7yhJWImJEf4HK40yFcV1/5It/IaHcteJcEVolWc0ggfxhpAROe+DMfbY9RvpUqkpij3UhMqlJIWQCb/pQXxu3lVXG07R0f65kTCXF5/sCRBPIxDk0AAK2eYEIZfgAelxUCPsUzXiE4kCeUYFZWJQDgZbyBiM+Jiq73BAYfoBpV4BIBHWnKThoW0DgRuiBWHCCyJ4lG5AnYEA90/7UvpzDwv3vhKis4LAlyPCY4oI2CB4pI1ACDQyMmNAO1PDxHvuqGhzADjwOCLBFkJXtFbGDkHlycZAZXQ1+/dAkTr1zY6/psJkxQlg1dwQUuUJIAgRAaKNcT8WZ6AQYUROEIAnAGMeYhTSqaiT4BWNVe8moSHR1Mn9KJUYC3pS661BZmfi5B8kohSf7+lmroWyTxPBO7e2XoFbuW1/+UBtCsbBitvzrY8IxnFXRwIR3OKIA/PsCDcVSjBsNlbS8xMMPqLpKXxgwEMPSwA5cMpAzhtFKh/VEGXylHmpwpwTj2y98jueOO/2ySCjs0JZe4sdAh1JbPBkfiAGpGiqFZRP8+2PAJcETjGODICCNSoQlGfCJ1lPkhmfx6mzzurgx+5KF7CuG1JnHADzaEX14loAcoFEK/de4epHypUY4+Rq9MuKWGO6aesqkLDy3pjn2V48/LICYSfvi2WssRDWqY4BjRYAafMKIDFpjABDCQRT2wgVp0PAUqVnESbEfVDMiNSGxvhR2u3veSpo6jtzjGwQO4QjCrxkZWUhnTg5/jDXuJBg/2cVO2/K4StbbGjzWwBw9k4YMQNLwWPtCID47BA0ujAwD5Y9wCqFSSBFhVDxwILXSo076rnENFTylq5wK6A1zAGt4WwVZjbSPZBn48ELKP7O0wIPlwkTuct9RDlwT/iQJFOKMSGemGM3iQCsb7IwSaGAUyUCAd1/rNbrHJeiFgZMc8mo1KPwAU9zf+TH/bLgOTeLdvIVUCpT0HwIYE15S2jxI8rCVWGPjP6xp2IPyrtDlPCLQDjqED5bMCHjC+aMAIatAE8TovB2OO43EtB6E5c4kho4kEo5kbu/iBQgM7ypioG7MoN6gAQEgGO7m2DVEJQCmDjUGd6VOiI6qSP9EUTpmFPsuaEzkZ0kgAfDiGbsAISuOBY2A8ARiFCZABKZG/qxGTEiGk1wIAEJkM+muzL9k/TIgEffkBvtgBR3gHOKiDWDuECsgBAMgHSwkneIkVURKx2psTr/kyJig0/yZIjriACxsyB6NYijiyrlEYPoygAGpoOn+oBGdABjMxsTzpsKX4EEQ8GzzYlAarNs56ikh4stezkECgrGbwBwJYhxSItQW4AGEYg3KZP2ObmV3am5jhDVP6th9ooq5og43BrIMZMT5QhFRIvI5YgFpQBKCRotvzJnPAgwAAgNQKpOs7DCqkFO77Mb5ICx1xmdDKDURAhwoQBjSItX9oAA9whwrBjbjKkKxIE6EIx7XomFCyjdzwnAKhwHlBAU0ynHlIBxjAiEOoBBaQBUZgBu6YBntYhECak88oj8soD88ohFeYPApzRU8Qx/uxkowogz+KhFnohVzwgAc4BGv8QP8cyIAIsJknYQxwapciKjSRZBN34biUa0c5aZ8vWx5qmIYCkIVjGAWZHAUrOIIPcDhwMAnMOsK62ywTE6hxs6/IebIxKZHZmyUZGLS9eEMiEAYutMYFAAEkyQfeQRaeCQAuSC10kBdigQL2o8PHUBZAugoKBJ3SertzM4dYsIJRiAJFwAS3RAFiUIRRcAZnsAfREKuSsCpW4pB0ia+jcMgYtLujyo1/Cig9yQRBwIFOsMaGIAUcEIRMeJUtIaPhIZ4/mw4MmQBOC4lMCTuYQQZiQAZeioIoKAHEQIEIIAZiCLqm6TEXshZtAS3Rwjj0YCgO6Rg/iER14gw+mAdAwAH/lrOoOhAGQIiEfSKvu/s4sqRAo6GNSbydn+wQv4vAq7mtEsGQfAEAelgBW2CDUqCxyxRI7XIS6hKl29qb27AOPRiVdvGoEIKciJqFRamAL3BMhziEB8hGoBmQDMiXDtm5VWQcAj2LEJI/znOdAGmO3Tgq38CEvHQojJCFadgIy2PE2nGOR0tC6LgZA8qId7ml6tyBDiPJBSgFcsiBT8TPhyCFCvCAadA+ejKVg2AVC3XI67GNJ0ABVehRVUCBvuGCHSgDkmwcbJAAeoiGavg7NiAVCsMHHYmcDPBRTJgHotkQPMgLy4PFeUEEUyyuKZyyUhAHQciBp2RRhxgEHPAA/2igL34bIUfYNWIRFrAaOcZAy3cBADXYBS3oUy3YhS1YAkJ4A2UIhwTQkSsrhEhThDqxkyZJpi4ghBlYgi1oBz9VgiVgAjY51OCRqEGSLEdzgMVkDTSFiDHAgXW4AHWYh6LCjTSaQc34jRPLUn9YAkmQBD+9VUm4BDkohnbYAjWIB1UwjF4wDNNEgUCYh3ng0XjYhl2ABVa4BGmVAy3AVS2I1i3QBy5InxcxDKswpBXsmNnABBR4B2HAARAwhVIdi2kEhFxIEEALOSKbV6TpTdjJAHTQBmv1U35lBVaQAznA1V3YhXgoyO6UAFsghCXgU13lV4fN1W3YpdsgmwAQl/+PaIFPIAIPwIE6UNd1jYhO8MRsFCK7MMQWYBWUBaGl0Bbfm6ht2NeHfVhdlYR2mIEV+IAuaIdfCNiY7VlWkIRdeLT2OQflWaaOOIAGEAQPqIAx+FiaMIUGeFFBgIZMwJRCmQA1YIWe3do+vVVY+AZtuASt5dqYlQQ1ILrGcCOPOIQGeIB1sIjGdNqacAMCgIMcwIELGIMv0Is3UIJLINuY9VfBBdyYlYNLmAGdMAVSqIMKeNsHGIMFkNuwWAA0IIDGXYcKuIAGIIUvMAWSBIku2ALCHV3SrdmQMIVDcIMxIIAHyIF1wNsU8FjJRY0vaIALQNW3rYAHuIA6qIMU+F3/4A3eFBiDFGgEVDhe5E1e5V1e5m3e5G0EXxgE4QXeBqgD1q0A3M2BCqgDUojc2XWUBeiEFLjeHChf110H9E1f9DVfYYAD931f+I1f+Z1f+o3fc33b81Xf9b3bCgABXyAF2f3ezDGFTCCFMaje3iUABV5gBm5gB35g6yUAHEDXCH5gCLZgBe7dBkgBKeiEQ/BeAQ7hIvkC7I1bET5hFCZhHHADFG5hET4EQRAEE3ZhGrYoU/ACSGAGHwCHShAAAWAERqAAIA6DMGCEAvABHYAEL0iDGm7isPACZgAHRvgAWYgGTTgCpUuFY5C6WqiFI/jiI+hipTMBLd7iI6CGaDCG/5sEB8RjYic+4RBgBgH4gBXQBKXzYhhQYwoQADZmBh0IgRDwAi8wBUK+YS8AZEjQAR0GBwHoBiqOhjCWuiOAARbohkrQAS9441JdAB0QgGmAgTumZAoAB2awRb0QiQXwAh0oAEboBmOw42OoBUo24kzWZGzyAh+ggBU4glQwgWiYBgFgBlPIiVRW4owoAHDgjk4OgTQABwD0B2YoAEj4iFRmhimGZC2m5GCuZVtODVzW5Vo4hiNgAUbwAS8ACc9dZc/9gGlIgxU4hi1uNh0wPsabBh6IBkhwhh1cAWdIBSsQgIyoBEs2ZY1QZXCg4yOI5Wj4AGnuZpoIAQGQhVpIhf9xFgAd+NyOiOgrZoYV4IFy5gErwEUToAAe2EEKsEtj8Ad71mcrCOKS9gIhzohacIZj+Gd/AAdynuaNMAU5ngZqgGcYmAZwCAGHfghjSIUVoICL7ggf84cCgAE/pAYemIZuMAUW4AETYAFnsIIQiAZnmGkK8AdN0ARjsAKV9mW7ZIQVSAVISONmo7BUKMAjsII0KIBa4AGGe8m33ogQqIRPBmqGBmEnDgEfGGeQmIaF+0OPxgitpoZaYIYPqEke4GeOtgJmoAYr8IGtfjy/TgVmEMA55oECuOodVD5nqNBu4IGm+wBnmGYTuGeM6AZG0GlkgYSD1oTMHmy1lrpUoIb/jDCFAvDpaVgAU3i8WliAEHAGFojtqR6+k2YEYxAAHqBHHoABK7hZK3DmI7jZWvCH5w4BE7ACGOABgPYHH5hqHehljIiGVHC2mjQBxuYBTRhmU3CjAvhqWRAAoj5hU6iEtTaB6PYCATiGc3bqr44Gjw4BK5gGZ/gAfziGeIRoHjCGmwXEZrtscAjuaWAEU9CB5AuBPwbADj9nSOiGDS9wH1A6KzABcKAA1oaBeZ66WvQHL7CCAjQFajiCZ8aIDxjpFSDjaNDv7w2BbghnYwCHAjdvz8aIfJaFAuABCtBsTbBLZkDwcGaEK44GRvCCAhjmU/6INIhjc14AFqBoH6AG/2c4amdouicPa2PggenWiGhYAYwIAZxWOhbwAbmN7COYbY6AhGMob39AcBv3B0aYcIeThUqQhW5AcpAg7hDI4QIogEqoBEb44R+u9Az34xDwXJBYYkNvtvuuZBhobZKObEHHxdLOCC+oBPaOhmReV0a47iTXiAWwSeIj79ieb39I4o7ocB+oBBc3BhjQhFqQOmTv4i/24i4+dmQ3ATxegWnY4wLA5I9ghiJf8EoYwCNwBkbIiPRmuI4oACuoBR34WGawY3HfiDk/5pbGCFBHFsKeY2Nw7DtGYxb4AAqohCPWgSQGZEE2BVwwBUAGcUWm9FZmgRWAgXCGdrK+SR+AhP9SIXh/6AYY8IGrDmsePAba1ghwmDpmkFsytwIH34hpOILf1gEv3wtmEOhXPoZUkGVGF4CI5+aoCvNgpwBZgAFeFuebDWaM9oIj0HiVRnmOYO0PcGPJrYS47nhGMAFT5mRPBmV/tgJjaHSVF2BcsG2dd+xepgZZiPJz/rGMaHeNaOtUqAQR1oFjWO6M8IFUOOJu2GUtJmsKYAYKf2NTiGwWoPpj0ARyFuY0qIVV7/VjoIZzP2EYKHl4TwXjG0BjqISorwVG0GRmOIamW4CW/4BoMAGannI9xAhyT3wRDoFaEPS9AGI6vuIjIOtuQGbMt+Wh94cOB4e59/yavHiNAO/fAkDhy/fDjoCESjAG46NpK6CGbp6GWuh8AawFFthmjMaIPkfhj691jMD2zp86YEY8H9BzWy6Am52GaDj2oBaAjtcIaUfhbtAEjcB2aqBoFpD8oq4JU8jlFZhoaugG4McI8QeIfwIHEixo8CDChARZrPBnqlK0VEc++Eij8CLGjBo3DvRS4IOmVNQoQPLnj9GRBRxXboz2QUCtVLIKqGRp8yZOg8ymxWShw4eJEDmHCjR1xIqJbkKJMm2qcYEAaqlWWPHh9KYOTR8OXe3qFWEBGM4YfeXoBVLZtGorVRoaEAA7";

$img = explode(',', $dataURI, 2)[1];
$pic = 'data://text/plain;base64,' . $img;

$pdf->SetMargins(5, 2, 1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetX(3);
$pdf->Image($pic, 2, 1.3, 2.3, 2.5, "gif");
$pdf->SetX(7);
$pdf->SetFont('Times', 'B', 16);
$pdf->MultiCell(70, 0.5, 'PEMERINTAH KOTA PALEMBANG', 0, 'L');
$pdf->SetX(7.4);
$pdf->SetFont('Times', 'B', 14);
$pdf->MultiCell(20, 0.5, 'KECAMATAN SEMATANG BORANG', 0, 'L');
$pdf->SetFont('Times', '', 10);
$pdf->SetX(5);
$pdf->MultiCell(19.3, 0.5, $profile['lokasi'], 0, 'L');
$pdf->SetX(10.6);
$pdf->MultiCell(19.5, 0.5, 'PALEMBANG', 0, 'L');
$pdf->SetX(10.6);
$pdf->MultiCell(19.5, 0.5, ' . ', 0, 'L');

$pdf->SetX(4);
$pdf->Line(1.5, 4.1, 20, 4.1);
$pdf->SetLineWidth(0.1);
$pdf->Line(1.5, 4.2, 20.1, 4.2);
$pdf->SetLineWidth(0);
// $pdf->ln(1);
if ($surat['id_surat'] == 'SKM') {
    $pdf->SetX(3.1);
    $pdf->Cell(15, 0.7, "", 0, 10, 'C');
    $pdf->SetFont('Times', 'BU', 16);
    $pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
    $pdf->ln(0.5);

    $pdf->SetFont('Times', '', 12);
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "     Yang bertanda tangan dibawah ini, Kecamatan " . $profile['kecamatan'] . " Kelurahan " . $surat['nm_kelurahan'] . " Kota Palembang Sumatera Selatan. Dengan ini menerangkan bahwa :", 0, 'L');

    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Nama             : ' . $surat['nama'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            NIK               : ' . $surat['nik'], 0, 'L');
    $pdf->SetX(3);
    // $pdf->MultiCell(19, 1, '      Alamat           : ' . $surat['alamat'], 0, 'L');
    $pdf->MultiCell(19, 1, '            Alamat           : ' . $surat['alamat'] . " RT." . $surat['rt'] . "/ RW." . $surat['rw'] . " Kelurahan " . $surat['nm_kelurahan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Kewarganegaraan    : Indonesia', 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Keterangan    : ' . $surat['keterangan'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bersangkutan adlaah benar warga kami yang beralamat seperti diatas, berdasarkan Surat Keterangan dari Lurah No. " . $surat['no_pengantar'] . " tanggal " . $surat['tgl_pengantar'] . " bahwa keluarga yang bersangkutan keadaaan ekonominya masuk dalam kategori Masyarakat/Keluarga Miskin", 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "     Surat Keterangan ini diperlukan untuk " . $surat['keterangan'], 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.", 0, 'L');
} else if ($surat['id_surat'] == 'SKTM') {

    $pdf->SetX(3.1);
    $pdf->Cell(15, 0.7, "", 0, 10, 'C');
    $pdf->SetFont('Times', 'BU', 16);
    $pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
    $pdf->ln(0.5);

    $pdf->SetFont('Times', '', 12);
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bertanda tangan dibawah ini, Kecamatan " . $profile['kecamatan'] . " Kelurahan " . $surat['nm_kelurahan'] . " Kota Palembang Sumatera Selatan. Dengan ini menerangkan bahwa :", 0, 'L');

    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Nama             : ' . $surat['nama'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            NIK               : ' . $surat['nik'], 0, 'L');
    $pdf->SetX(3);
    // $pdf->MultiCell(19, 1, '      Alamat           : ' . $surat['alamat'], 0, 'L');
    $pdf->MultiCell(19, 1, '            Alamat           : ' . $surat['alamat'] . " RT/RW" . $surat['rt'] . "/" . $surat['rw'] . " Kelurahan " . $surat['nm_kelurahan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Keterangan    : ' . $surat['keterangan'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bersangkutan adlaah benar warga kami yang beralamat seperti diatas, berdasarkan Surat Keterangan dari Lurah No. " . $surat['no_pengantar'] . " tanggal " . $surat['tgl_pengantar'] . " bahwa keluarga yang bersangkutan keadaaan ekonominya masuk dalam kategori Masyarakat/Keluarga Tidak Mampu", 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Surat Keterangan ini diperlukan untuk " . $surat['keterangan'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.", 0, 'L');
} else if ($surat['id_surat'] == 'SKBPR') {

    $pdf->SetX(3.1);
    $pdf->Cell(15, 0.7, "", 0, 10, 'C');
    $pdf->SetFont('Times', 'BU', 16);
    $pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
    $pdf->ln(0.5);

    $pdf->SetFont('Times', '', 12);
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bertanda tangan dibawah ini, Kecamatan " . $profile['kecamatan'] . " Kelurahan " . $surat['nm_kelurahan'] . " Kota Palembang Sumatera Selatan. Dengan ini menerangkan bahwa :", 0, 'L');

    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Nama             : ' . $surat['nama'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            NIK               : ' . $surat['nik'], 0, 'L');
    $pdf->SetX(3);
    // $pdf->MultiCell(19, 1, '      Alamat           : ' . $surat['alamat'], 0, 'L');
    $pdf->MultiCell(19, 1, '            Alamat           : ' . $surat['alamat'] . " RT/RW" . $surat['rt'] . "/" . $surat['rw'] . " Kelurahan " . $surat['nm_kelurahan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Keterangan    : ' . $surat['keterangan'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bersangkutan adalah benar warga kami yang beralamat seperti diatas, berdasarkan Surat Keterangan dari Lurah No. " . $surat['no_pengantar'] . " tanggal " . $surat['tgl_pengantar'] . " bahwa benar yang bersangkutan belum punya rumah sendiri", 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Surat Keterangan ini diperlukan untuk " . $surat['keterangan'], 0, 'L');


    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Surat Keterangan dinyatakan tidak berlaku apabila terjadi pelanggaran peraturan Perundang-undangan serta apabila terdapat kekeliruan/kesalahan dalam pembuatannya, pemohon/pemegang bersedia mempertanggung jawabkan secara hukum tanpa melibatkan pihak manapun", 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.", 0, 'L');
}

if ($surat['id_surat'] == 'SKP') {
    $pdf->SetX(3.1);
    $pdf->Cell(15, 0.7, "", 0, 10, 'C');
    $pdf->SetFont('Times', 'BU', 16);
    $pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
    $pdf->ln(0.5);

    $pdf->SetFont('Times', '', 12);
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "     Yang bertanda tangan dibawah ini, Kecamatan " . $profile['kecamatan'] . " Kelurahan " . $surat['nm_kelurahan'] . " Kota Palembang Sumatera Selatan. Dengan ini menerangkan bahwa :", 0, 'L');

    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Nama             : ' . $surat['nama'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            NIK               : ' . $surat['nik'], 0, 'L');
    $pdf->SetX(3);
    // $pdf->MultiCell(19, 1, '      Alamat           : ' . $surat['alamat'], 0, 'L');
    $pdf->MultiCell(19, 1, '            Alamat           : ' . $surat['alamat'] . " RT." . $surat['rt'] . "/ RW." . $surat['rw'] . " Kelurahan " . $surat['nm_kelurahan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Keterangan    : ' . $surat['keterangan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Pekerjaan     : ' . $surat['pekerjaan'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bersangkutan adlaah benar warga kami yang beralamat seperti diatas, berdasarkan Surat Keterangan dari Lurah No. " . $surat['no_pengantar'] . " tanggal " . $surat['tgl_pengantar'] . " bahwa yang bersangkutan yakni " . $surat['nama'] . "", 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Surat Keterangan ini diperlukan untuk " . $surat['keterangan'], 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Surat keterangan dinyatakan tidak berlaku apabila terjadi pelanggaran peraturan Perundang-undangan dan Perda Kota Palembang serta apabila terdapat kekeliruan/kesalahan dalam pembuatannya, pemohon/pemegang bersedia mempertanggung jawabkan secara hukum tanpa melibatkan pihak manapun..", 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.", 0, 'L');
}
if ($surat['id_surat'] == 'SPSKCK') {
    $pdf->SetX(3.1);
    $pdf->Cell(15, 0.7, "", 0, 10, 'C');
    $pdf->SetFont('Times', 'BU', 16);
    $pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
    $pdf->ln(0.5);

    $pdf->SetFont('Times', '', 12);
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bertanda tangan dibawah ini, Kecamatan " . $profile['kecamatan'] . " Kelurahan " . $surat['nm_kelurahan'] . " Kota Palembang Sumatera Selatan. Dengan ini menerangkan bahwa :", 0, 'L');

    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Nama             : ' . $surat['nama'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            NIK               : ' . $surat['nik'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Alamat           : ' . $surat['alamat'] . " RT/RW" . $surat['rt'] . "/" . $surat['rw'] . " Kelurahan " . $surat['nm_kelurahan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            Keterangan    : ' . $surat['keterangan'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bersangkutan adlaah benar warga kami yang beralamat seperti diatas, berdasarkan Surat Keterangan dari Lurah No. " . $surat['no_pengantar'] . " tanggal " . $surat['tgl_pengantar'] . " dan pengakuannya, bahwa dengan ini yang bersangkutan :", 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            1. Berkehidupan baik dalam kehidupan bermasyarakat ', 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            2. Tidak tersangkut perkara kriminal dengan instansi kepolisian', 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            3. Tidak dalam status tahanan berwajib', 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '            4. Tidak terlibat pengunaan obat-obat terlarang', 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, '       Surat Keterangan ini diperlukan untuk ' . $surat['keterangan'] . '.', 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Surat Keterangan dinyatakan tidak berlaku apabila terjadi pelanggaran peraturan Perundang-undangan serta apabila terdapat kekeliruan/kesalahan dalam pembuatannya, pemohon/pemegang bersedia mempertanggung jawabkan secara hukum tanpa melibatkan pihak manapun.", 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.", 0, 'L');
}

if ($surat['id_surat'] == 'SKN') {
    $pdf->SetX(3.1);
    $pdf->Cell(15, 0.7, "", 0, 10, 'C');
    $pdf->SetFont('Times', 'BU', 16);
    $pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
    $pdf->ln(0.5);

    $pdf->SetFont('Times', '', 12);
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bertanda tangan dibawah ini, Kecamatan " . $profile['kecamatan'] . " Kelurahan " . $surat['nm_kelurahan'] . " Kota Palembang Sumatera Selatan. Dengan ini menerangkan bahwa :", 0, 'L');

    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          1.  Nama                       : ' . $surat['nama'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          2.  NIK                         : ' . $surat['nik'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          3.  Tempat Tinggal      : ' . $surat['alamat'] . " Kelurahan " . $surat['nm_kelurahan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          4.  Keterangan              : ' . $surat['keterangan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          5.  Kewarganegaraan   : Indonesia', 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          6.  Status Perkawinan   : Belum Menikah', 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(19, 1, "Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.", 0, 'L');
}

if ($surat['id_surat'] == 'SPIK') {
    $pdf->SetX(3.1);
    $pdf->Cell(15, 0.7, "", 0, 10, 'C');
    $pdf->SetFont('Times', 'BU', 16);
    $pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
    $pdf->ln(0.5);

    $pdf->SetFont('Times', '', 12);
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bertanda tangan dibawah ini, Kecamatan " . $profile['kecamatan'] . " Kelurahan " . $surat['nm_kelurahan'] . " Kota Palembang Sumatera Selatan. Dengan ini menerangkan bahwa :", 0, 'L');

    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          1.  Nama                       : ' . $surat['nama'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          2.  NIK                         : ' . $surat['nik'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          3.  Tempat Tinggal      : ' . $surat['alamat'] . " Kelurahan " . $surat['nm_kelurahan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          4.  Keterangan              : ' . $surat['keterangan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          5.  Kewarganegaraan   : Indonesia', 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          6.  Keperluan              : ' . $surat['keperluan'], 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, '       Surat ini berfungsi untuk memberi izin keramaian di Kecamatan Sematang Borang Kelurahan ' . $surat['nm_kelurahan'] . " yang beralamat " . $surat['almt_keramaian'] . ".", 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(19, 1, "Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.", 0, 'L');
}

if ($surat['id_surat'] == 'SKDP') {
    $pdf->SetX(3.1);
    $pdf->Cell(15, 0.7, "", 0, 10, 'C');
    $pdf->SetFont('Times', 'BU', 16);
    $pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
    $pdf->ln(0.5);

    $pdf->SetFont('Times', '', 12);
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "Kecamatan Sematang Borang bersama ini menerangkan bahwa :", 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Nama                     : ' . $surat['nama'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          NIK                       : ' . $surat['nik'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Tempat Tinggal    : ' . $surat['alamat'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Keterangan            : ' . $surat['keterangan'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, 'Benar mempunyai perusahaan yang berdomisili dalam wilayah kelurahan ' . $surat['nm_kelurahan'] . ' Kecamatan Sematang Borang Kota Palembang dengan keterangan sebagai berikut :', 0, 'L');

    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Nama Perusahaan    : ' . $surat['nm_perusahaan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Alamat                     : ' . $surat['almt_perusahaan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Akte Pendiri            : ' . $surat['no_akte'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Bergerak dibidang  : ' . $surat['bidang_usaha'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Jumlah Pegawai      : ' . $surat['jml_karyawan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Jam Kerja                : ' . $surat['jam_kerja'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Surat keterangan ini dikeluarkan kepada yang bersangkutan untuk 1 (satu) kali keperluan pengurusan izin tempat usaha. Wajib diperbaharui apabila sudah terdapat hal yang tidak sesuai dengan surat ini.", 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Surat keterangan ini tidak berlaku apablia terjadi pelanggaran pepraturan perundang-undangan/peraturan daerah kota palembang dan atau kekeliruan/kesalahan dalam pembuatananya.", 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.", 0, 'L');
}

if ($surat['id_surat'] == 'SPC') {
    $pdf->SetX(3.1);
    $pdf->Cell(15, 0.7, "", 0, 10, 'C');
    $pdf->SetFont('Times', 'BU', 16);
    $pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
    $pdf->ln(0.5);

    $pdf->SetFont('Times', '', 12);
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "     Yang bertanda tangan dibawah ini, Kecamatan " . $profile['kecamatan'] . " Kelurahan " . $surat['nm_kelurahan'] . " Kota Palembang Sumatera Selatan. Dengan ini menerangkan bahwa :", 0, 'L');

    $pdf->SetX(3);
    $pdf->MultiCell(18.4, 1, '          Nama                          : ' . $surat['nama'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(18.4, 1, '          NIK                            : ' . $surat['nik'], 0, 'L');
    $pdf->SetX(3);
    // $pdf->MultiCell(18.4, 1, '      Alamat           : ' . $surat['alamat'], 0, 'L');
    $pdf->MultiCell(18.4, 1, '          Alamat                        : ' . $surat['alamat'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(18.4, 1, '          Kewarganegaraan      : Indonesia', 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(18.4, 1, '          Status Perkawinan     : Duda/Janda/Meninkah', 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(18.4, 1, '          Keterangan                 : ' . $surat['keterangan'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, '       Surat Keterangan ini diperlukan untuk ' . $surat['keterangan'] . '.', 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.", 0, 'L');
}

if ($surat['id_surat'] == 'SKOS') {
    $pdf->SetX(3.1);
    $pdf->Cell(15, 0.7, "", 0, 10, 'C');
    $pdf->SetFont('Times', 'BU', 16);
    $pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
    $pdf->ln(0.5);

    $pdf->SetFont('Times', '', 12);
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "     Yang bertanda tangan dibawah ini, Kecamatan " . $profile['kecamatan'] . " Kelurahan " . $surat['nm_kelurahan'] . " Kota Palembang Sumatera Selatan. Dengan ini menerangkan bahwa :", 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Nama                     : ' . $surat['nama'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          NIK                       : ' . $surat['nik'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Tempat Tinggal    : ' . $surat['alamat'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Kewarganegaraan : Indonesia', 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Keterangan            : ' . $surat['keterangan'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Berdasarkan pernyataan dan surat pengantar Lurah No. " . $surat['no_pengantar'] . " tertanggal " . $surat['tgl_pengantar'] . " bahwa " . $surat['nama'] . " adalah orang yang sama.", 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Nama yang digunakan yakni : " . $surat['nm_yg_dipakai'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Surat keterangan ini tidak berlaku apablia terjadi pelanggaran pepraturan perundang-undangan/peraturan daerah kota palembang dan atau kekeliruan/kesalahan dalam pembuatananya.", 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.", 0, 'L');
}

if ($surat['id_surat'] == 'SKD') {
    $pdf->SetX(3.1);
    $pdf->Cell(15, 0.7, "", 0, 10, 'C');
    $pdf->SetFont('Times', 'BU', 16);
    $pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
    $pdf->ln(0.5);

    $pdf->SetFont('Times', '', 12);
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "     Yang bertanda tangan dibawah ini, Kecamatan " . $profile['kecamatan'] . " Kelurahan " . $surat['nm_kelurahan'] . " Kota Palembang Sumatera Selatan. Dengan ini menerangkan bahwa :", 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Nama                     : ' . $surat['nama'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          NIK                       : ' . $surat['nik'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Tempat Tinggal    : ' . $surat['alamat'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Kewarganegaraan : Indonesia', 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Keterangan            : ' . $surat['keterangan'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Berdasarkan pernyataan dan surat pengantar Lurah No. " . $surat['no_pengantar'] . " tertanggal " . $surat['tgl_pengantar'] . " bahwa " . $surat['nama'] . " yang bersangkutan adalah penduduk " . $surat['nm_kelurahan'] . " Kecamatan Sematang Borang yang berdomisili pada alamat tersebut diatas.", 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Surat keterangan ini tidak berlaku apablia terjadi pelanggaran pepraturan perundang-undangan/peraturan daerah kota palembang dan atau kekeliruan/kesalahan dalam pembuatananya, pemohon/pemegang bersedia mempertanggung jawabkan secara hukum tanpa melibatkan pihak manapun.", 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.", 0, 'L');
}

if ($surat['id_surat'] == 'SKU') {
    $pdf->SetX(3.1);
    $pdf->Cell(15, 0.7, "", 0, 10, 'C');
    $pdf->SetFont('Times', 'BU', 16);
    $pdf->Cell(15, 0.7, $kode[$surat['id_surat']], 0, 10, 'C');
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(15, 0.7, 'Nomor : ' . $surat['no_surat'], 0, 10, 'C');
    $pdf->ln(0.5);

    $pdf->SetFont('Times', '', 12);
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "     Yang bertanda tangan dibawah ini, Kecamatan " . $profile['kecamatan'] . " Kelurahan " . $surat['nm_kelurahan'] . " Kota Palembang Sumatera Selatan. Dengan ini menerangkan bahwa :", 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Nama                         : ' . $surat['nama'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          NIK                           : ' . $surat['nik'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Tempat Tinggal         : ' . $surat['alamat'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Pekerjaan                   : ' . $surat['pekerjaan'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Kewarganegaraan    : Indonesia', 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Nama Usaha             : ' . $surat['nm_usaha'], 0, 'L');
    $pdf->SetX(3);
    $pdf->MultiCell(19, 1, '          Alamat Usaha           : ' . $surat['almt_usaha'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Yang bersangkutan adalah warga kami yang berdasarkan Surat Keterangan dari  Kelurahan nomor " . $surat['no_pengantar'] . " tanggal " . $surat['tgl_pengantar'] . " dan pengakuannya, bahwa benar yang bersangkutan memiliki usaha " . $surat['nm_usaha'] . " yang berlokasi di " . $surat['almt_usaha'], 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Surat Keterangan ini diperlukan untuk : " . $surat['nm_yg_dipakai'], 0, 'L');

    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Surat keterangan dinyatakan tidak berlaku apabila terjadi pelanggaran peraturan Perundang-undangan dan Perda Kota Palembang]  serta apabila terdapat kekeliruan/kesalahan dalam pembuatannya, pemohon/pemegang bersedia mempertanggung jawabkan secara hukum tanpa melibatkan pihak manapun.", 0, 'L');
    $pdf->SetX(2);
    $pdf->MultiCell(18, 1, "       Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.", 0, 'L');
}


$pdf->MultiCell(19.5, 1, '', 0, 'L');
$pdf->MultiCell(19.5, 1, '', 0, 'L');
$pdf->MultiCell(19.5, 1, '', 0, 'L');
$pdf->MultiCell(19.5, 1, '', 0, 'L');
$pdf->SetFont('Times', 'B', 11);


$pdf->SetX(2.7);
$pdf->Cell(27, 0.7, "Palembang, " . date("d-m-Y"), 0, 10, 'C');
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(27, 0.7, "Mengetahui Camat", 0, 10, 'C');
$pdf->Cell(27, 0.7, "", 0, 10, 'C');
$pdf->Cell(27, 0.7, "", 0, 10, 'C');
$pdf->Cell(27, 0.7, "", 0, 10, 'C');
$pdf->Cell(27, 0.7, $profile['camat'], 0, 10, 'C');
$pdf->ln(1);

$pdf->Output();
